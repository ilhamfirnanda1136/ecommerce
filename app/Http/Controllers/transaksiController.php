<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{produk,customer,merk,cart,transaksi,kirim};

use Validator,DB,Session,Carbon,PDF;

class transaksiController extends Controller
{
    /* Cart */
    public function indexCart()
    {
        $cart = cart::with(['produk'])->where('customer_id',Session::get('customer')->id)
                    ->where('status',0)
                    ->orderBy('id','desc')
                    ->get();
        return view('customer.cart.cart_view',compact('cart'));
    }

    public function addCart($uuid)
    {
        if(!Session::has('customer')) return redirect('login/customer');
        $produk = produk::where('uuid',$uuid)->first();
        $cartCheck = cart::where('customer_id',Session::get('customer')->id)
                            ->where('produk_id',$produk->id)
                            ->where('status',0)
                            ->first();
        if(!$cartCheck) {
            $cekid = 0;
            $data = [
                'customer_id' => Session::get('customer')->id,
                'produk_id' => $produk->id,
                'jumlah_beli'=> 1,
                'total_harga'=> $produk->harga,
                'status' => 0
            ];
        } else {
            $cekid = $cartCheck->id;
            $jumlah = $cartCheck->jumlah_beli + 1;
            $harga = $cartCheck->total_harga + $produk->harga;
            $data = [
                'jumlah_beli'=> $jumlah,
                'total_harga'=> $harga
            ];
        }
        $cart = cart::updateOrCreate(['id'=>$cekid],$data);
        return redirect()->back()->with('suksesCart','anda telah berhasil menambah cart');
    }

    public function viewProduk($uuid)
    {
        $produk = produk::with(['merk'])->where('uuid',$uuid)->first();
        return view('customer.home.view_produk',compact('produk'));
    }

    public function hapusCart($id)
    {
        $cart = cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('sukses','anda telah menghapus produk di cart anda');
    }

    /* Transaksi */

    public function orderConfirmation(Request $request)
    {
        $cekout = $request->cekbox;
        $idCart = [];
        for ($i=0; $i < count($cekout) ; $i++) { 
            $cart   = cart::findOrFail($cekout[$i]);
            $stok   = $request['stok-form-'.$cekout[$i]];
            $produk = produk::findOrFail($cart->produk_id);
            if($cart->jumlah_beli != $stok ) {
                $total  = $produk->harga * $stok ;
                $cart->total_harga = $total;
                $cart->jumlah_beli = $stok ;
            }
            $produk->stok -= $stok;
            $produk->save(); 
            $cart->status = 1;
            $cart->save();
            array_push($idCart,$cart->id);
        }
        $transaksi = new transaksi();
        $field = "no_transaksi";
        $kuitansiKode=DB::table('transaksi')->select(DB::raw('MAX(right('.$field.',5)) as kd_max'));
        if($kuitansiKode->count() > 0) {
            foreach($kuitansiKode->get() as $loopkuitansi) {
                $tmp = ((int)$loopkuitansi->kd_max) + 1;
                $kode = "JC".date("Y").sprintf("%05s",$tmp);
            }
        }
        else $kode = "JC".date("Y")."00001";
        $transaksi->alamat_pengiriman = $request->alamat_pengiriman=='' ? Session::get('customer')->alamat : $request->alamat_pengiriman;
        $transaksi->no_transaksi = $kode;
        $transaksi->pesan = $request->pesan;
        $transaksi->customer_id = Session::get('customer')->id;
        $transaksi->tanggal_transaksi = Carbon\Carbon::now();
        $transaksi->status = 0;
        $transaksi->save(); 
        $cartMany = cart::whereIn('id',$idCart)->get();
        foreach ($cartMany as $c) {
            $transaksi->cart()->attach($c->id);
        }
        return redirect('/')->with('sukses','anda telah berhasil memesan produk silahkan cek di menu pesanan anda');
    }

    public function indexTransaksi()
    {
        $transaksi = transaksi::where('customer_id',Session::get('customer')->id)
                                ->where('status',0)->orderBy('id','desc')->get();
        $transaksiKirim = transaksi::with(['kirim'])->where('customer_id',Session::get('customer')->id)
                                ->where('status',2)->orderBy('id','desc')->get();
        $transaksiSelesai = transaksi::with(['kirim'])->where('customer_id',Session::get('customer')->id)
                                ->where('status',1)->orderBy('id','desc')->get();
        return view('customer.transaksi.transaksi_view',compact('transaksi','transaksiKirim','transaksiSelesai'));
    }

    public function produkAmbil($id)
    {
        $transaksi = transaksi::with(['cart' => function($query) {
            return $query->with(['produk']);
        }])->where('id',$id)->get();
        return response()->json(['transaksi'=>$transaksi]);
    }

    public function pdfTransaksi($id)
    {
        $transaksi = transaksi::with(['cart' => function($query) {
            return $query->with(['produk']);
        }])->where('id',$id)->first();
        $customer = customer::findOrFail(Session::get('customer')->id);
        $pdf = PDF::loadView('customer.transaksi.pdf', compact(['transaksi','customer']));
        return $pdf->stream('transaksi.pdf'); 
    }

    public function uploadBukti(Request $request)
    {
        $transaksi = transaksi::findOrFail($request->id);
        $file = $request->file('foto');
        $nama_file = "bukti-".date("Y")."-".substr(md5(rand()),0,6).$file->getClientOriginalName();
        $transaksi->bukti = $nama_file;
        $file->move('images/bukti/',$nama_file);
        $transaksi->save();
        return redirect()->back()->with('sukses','anda telah berhasil mengupload bukti bayar');
    }

    public function konfirmasiProduk($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->status = 1;
        $transaksi->save();
        return redirect()->back()->with('sukses','terima kasih telah memesan produk ditoko kami');
    }


    /* admin */

    public function indexAdminBaru()
    {
        $transaksi = transaksi::with(['cart' => function($query) {
            return $query->with(['produk']);
        },'customer'])->where('status',0)->orderBy('id','desc')->get();
        return view('admin.transaksi.baru_view',compact('transaksi'));
    }

    public function simpanPengirimanBarang(Request $request)
    {
        $kirim = new kirim();
        $kirim->keterangan = $request->keterangan;
        $kirim->tanggal_sampai = $request->tanggal_sampai;
        $kirim->status = 0;
        $kirim->transaksi_id = $request->id;
        $kirim->save();
        $transaksi = transaksi::findOrFail($request->id);
        $transaksi->status = 2;
        $transaksi->save();
        return redirect()->back()->with('sukses','anda telah berhasil mengirimkan barang');
    }

    public function indexAdminKirim()
    {
        $transaksi = transaksi::with(['cart' => function($query) {
            return $query->with(['produk']);
        },'customer','kirim'])->where('status',2)->orderBy('id','desc')->get();
        return view('admin.transaksi.kirim_view',compact('transaksi'));
    }

    public function indexAdminSelesai()
    {
        $transaksi = transaksi::with(['cart' => function($query) {
            return $query->with(['produk']);
        },'customer','kirim'])->where('status',1)->orderBy('id','desc')->get();
        return view('admin.transaksi.selesai_view',compact('transaksi'));
    }
}
