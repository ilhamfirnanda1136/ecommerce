<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\{merk,produk};

use Validator,DataTables,Auth,DB;

class produkController extends Controller
{

    /* Produk */
    public function indexProduk()
    {
        $merk = merk::orderBy('nama_merk')->get();
        return view('admin.produk.produk.produk_view',compact(['merk']));
    }
    
    protected function kodeOtomatis()
    {
        $kode_produk='no_produk';
    	$produk=DB::table('produk')->select(DB::raw('MAX(RIGHT('.$kode_produk.',5)) as kd_max'));
        if($produk->count()>0) {
            foreach($produk->get() as $loopproduk) {
                $tmp = ((int)$loopproduk->kd_max)+1;
                $kode = "PRO".sprintf("%05s",$tmp);
            }
        }
        else $kode = "PRO00001";
        return $kode;
    }
    
    public function dataProduk()
    {
        $model = produk::with(['merk']);
        return DataTables::of($model)
        ->addColumn('action',function($model){
            return view('admin.produk.produk.action',compact(['model'])); 
        })
        ->addColumn('nama_merk',function($model){
            return $model->merk->nama_merk;
        })
        ->addColumn('stok_produk',function($model){
            return $model->stok."<button class='btn btn-sm btn-danger btn-decrease' data-id='{$model->id}'><i class='fa fa-minus'></i></button> <button class='btn mr-5 btn-sm btn-primary btn-increase' data-id='{$model->id}'><i class='fa fa-plus'></i></button>";
        })
        ->addColumn('harga_produk',function($model){
            return "Rp ".number_format($model->harga,0,'','.');
        })
        ->addColumn('gambar_produk',function($model){
            $url = asset("images/produk/{$model->gambar}");
            return "<image src='{$url}' alt='{$model->nama_produk}' style='width:100%;height:100px'>";
        })
        ->addIndexColumn()
        ->rawColumns(['action','nama_merk','gambar_produk','harga_produk','stok_produk'])
        ->make(true);
    }

    public function ambilProduk($id)
    {
        $produk = produk::findOrFail($id);
        return response()->json($produk);
    }

    public function simpanProduk(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_produk' => 'required',
            'spesifikasi' => 'required',
            'warna'=> 'required',
            'keterangan' => 'required',
            'harga'=>'required',
            'gambar'=> 'mimes:jpg,png,jpeg'
        ]);
        if ($validator->fails()) return response()->json(['errors'=>$validator->errors()]);
        $produk = produk::updateOrCreate(['id'=>$request->id],$request->all());
        if ($request->id == null) {
            $produk->no_produk = $this->kodeOtomatis();
            $produk->uuid = Str::uuid();
        }
        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = "gambar-".date("Y")."-".substr(md5(rand()),0,6).$file->getClientOriginalName();
            $produk->gambar = $nama_file;
            $request->file('gambar')->move('images/produk/',$nama_file);
        }
        $produk->save();
        $message = $request->id == null ? 'anda telah berhasil menambahkan produk' : 'anda telah berhasil mengubah produk';
        return response()->json(['success'=>$request->all(),'message'=>$message], 200);
    }

    public function simpanProdukStok(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'stok'=> 'required'
        ]);
        if ($validator->fails()) return response()->json(['errors'=>$validator->errors()]);
        $produk = produk::findOrFail($request->id);
        if($request->edit_stok === 'increase') $produk->stok += $request->stok;
        if($produk->stok === 0) return response()->json(['success'=>$request->all(),'messages'=>'mohon maaf stok sudah kosong tidak bisa dikurang lagi']);
        if($request->edit_stok === 'decrease') $produk->stok -= $request->stok;
        $message = $request->edit_stok === 'increase' ? 'anda telah berhasil menambahkan stok di produk '.$produk->nama_produk : 'anda telah berhasil mengurangi stok di produk '.$produk->nama_produk;
        $produk->save();
        return response()->json(['success'=>$request->all(),'message'=>$message]); 
    }


    /* Merek */
    public function indexMerk()
    {
        $merk = merk::orderBy('nama_merk')->get();
        return view('admin.produk.merk.merk_view',compact('merk'));
    }

    public function simpanMerk(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_merk' => 'required'
        ]);
        if($validator->fails()) return response()->json(['error'=>$validator->errors()]);
        $merk = merk::updateOrCreate(['id'=>$request->id],$request->all());
        $message = $request->id==null ? 'Anda telah berhasil menambahkan merk' : 'Anda telah berhasil mengubah merk';
        return response()->json(['success'=>$request->all(),'message'=>$message]);
    }

    /* Banner */

    public function indexBanner()
    {
        return view('admin.banner.banner_view');
    }
}
    