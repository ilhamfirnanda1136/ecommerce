<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Hash;

use App\Models\User;

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

    public function indexRegisterCustomer()
    {
        return view('auth.register_customer');
    }
}
