<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User,produk,merk};

class homeController extends Controller
{
    public function index()
    {
        return view('admin.home.home_view');
    }
    
    public function indexCustomer(Request $request)
    {
        $produks = produk::with(['merk'=>function ($query) {
            return $query->orderBy('nama_merk', 'asc');
        }]);
        if($request->nama != null) {
            $produks->where('nama_produk','like','%'.$request->nama.'%');
        }
        $produk = $produks->paginate(12);
        return view('customer.home.home_view',compact('produk'));
    }

    public function cariProduk($merk)
    {
        $merk = merk::where('nama_merk',$merk)->first();
        $produk = produk::with(['merk'=>function ($query) {
            return $query->orderBy('nama_merk', 'asc');
        }])->where('merk_id',$merk->id)->paginate(12);
        return view('customer.home.home_view',compact('produk'));
    }
}
