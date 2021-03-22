<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{customer,provinsi,kabupaten};

use Session;

class customerController extends Controller
{

    public function index()
    {
        $customer = customer::orderBy('id','desc')->paginate(12);
        return view('admin.customer.customer_view',compact('customer'));
    }

    public function profileCustomer()
    {
        $provinsi = provinsi::orderBy('nama_provinsi')->get();
        $customer = Session::get('customer');
        $kabupaten = kabupaten::orderBy('nama_kabupaten','asc')->where('provinsi_id',$customer->provinsi_id)->get();
        return view('customer.profile.profile_view',compact('provinsi','customer','kabupaten'));
    }

    public function profileCustomerUpdate(Request $request)
    {
        $customer = customer::updateOrCreate(['id'=>Session::get('customer')->id],$request->all());  
        Session::forget('customer');
        Session::put('customer',$customer);
        return redirect()->back()->with('sukses','anda telah berhasil mengubah profile');    
    }

    public function updateAvatar(Request $request)
    {
        $customer = customer::findOrFail($request->id);
        $file = $request->file('foto');
        $nama_file = "avatar-".date("Y")."-".substr(md5(rand()),0,6).$file->getClientOriginalName();
        $customer->avatar = $nama_file;
        $customer->save();
        $file->move('images/customer/',$nama_file); 
        Session::forget('customer');
        Session::put('customer',$customer);
        $message = "anda telah berhasil mengubah avatar";
        return response()->json(['message'=>$message,'status'=>'success']);
    }

    public function detailCustomer($uuid)
    {
        $customer = customer::with(['provinsi','kabupaten'])->where('uuid',$uuid)->first();
        return view('admin.customer.detail',compact('customer'));
    }
}
