<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{produk,customer,merk,cart};

use Validator,DB,Session;

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
        if(!Session::has('customer'))  return redirect('login/customer');
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
}
