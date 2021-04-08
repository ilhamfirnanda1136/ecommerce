<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth,Hash,Validator,Session;

use App\Models\{User,customer,provinsi,kabupaten};

class AuthController extends Controller
{
    /* admin */
    public function index()
    {
        return view('auth.login_admin');
    }

    public function process(Request $req)
    {
        $req->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);
        $user = User::where('username',$req->username)->first();
        if(!$user) return redirect()->back()->with('error','mohon maaf username yang anda masukkan salah');
        if(!Auth::attempt(['username' => $req->username, 'password' => $req->password]))
        return redirect()->back()->with('error','mohon maaf password yang anda masukkan salah');
        return redirect('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); 
    }

    /* customer */

    public function indexLoginCustomer()
    {
        return view('auth.login_customer');
    }

    public function processLoginCustomer(Request $request)
    {
        $customer   = customer::where('email',$request->email)->first();
        if ($customer) {
            $hashedPassword = $customer->password;
            if (Hash::check($request->password,$hashedPassword)) {
                 Session::put('customer',$customer);
                 return redirect('home/customer');
            }
            return redirect()->back()->with('error','anda gagal login mohon cek password anda');
        }
        return redirect()->back()->with('error','anda gagal login mohon cek email anda ');

    }

    public function indexRegisterCustomer()
    {
        $provinsi = provinsi::orderBy('nama_provinsi','asc')->get();
        return view('auth.register_customer',compact('provinsi'));
    }

    public function processRegisterCustomer(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required','username' => 'required','email' => 'required',
            'password' => 'required','gender' => 'required' , 'gender' => 'required',
            'no_telp' => 'required','provinsi_id' => 'required' , 'kabupaten_id' => 'required',
            'kode_pos' => 'required'
        ]);
        if ($validator->fails()) return response()->json(['errors'=>$validator->errors()]);
        // $request->password =;
        $request->request->add(['uuid'=>Str::uuid(),'password'=>Hash::make($request->password)]);
        $customer = customer::create(array_merge($request->all()));
        Session::put('customer',$customer);
        $message = "anda telah berhasil melakukan registrasi sebagai customer";
        return response()->json(['success'=>$request->all(),'message'=>$message]);
    }

    public function logoutCustomer()
    {
        Session::forget('customer');
        return redirect('/');
    }

    public function kabupaten($id)
    {
        if ($id == '') return response()->json(['status'=>404]);
        $kabupaten = kabupaten::where('provinsi_id',$id)->get();
        return response()->json(['kabupaten'=>$kabupaten,'status'=>200]);
    }
}
