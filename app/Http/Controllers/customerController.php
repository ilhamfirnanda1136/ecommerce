<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{customer,provinsi,kabupaten};

use Session;

class customerController extends Controller
{
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
         
    }
}
