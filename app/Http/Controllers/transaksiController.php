<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{produk,customer,merk};

use Validator,DB,Auth;

class transaksiController extends Controller
{
    public function addCart($uuid)
    {
        if(!Auth::check()) return redirect('login/customer');
    }

    public function viewProduk($uuid)
    {
        $produk = produk::with(['merk'])->where('uuid',$uuid)->first();
        return view('customer.home.view_produk',compact('produk'));
    }
}
