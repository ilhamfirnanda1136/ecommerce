<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User};

use Auth;

class userController extends Controller
{
    public function ubahProfile()
    {
      $user=user::find(Auth::user()->id);
      return view('admin.user.ubah_profile',compact(['user']));
    }

    public function simpanUbahProfile(Request $request)
    {
        $validate= array(
            'nama'=>'required',
            'username'=>'required'
        );
        $this->validate($request,$validate,['required'=>'Form ini harus diisi','unique'=>':attribute telah dipakai mohon ganti dengan yang lain']);
        $user=user::find(Auth::user()->id);
        $user->name=$request->nama;
        $user->username = $request->username;
        $user->save();
        return redirect()->back()->with('successMSG','Anda Telah Berhasil Mengubah Profile Anda');
    }
    public function ubahPassword()
    {
      return view('admin.user.ubah_password');
    }
    public function simpanUbahPassword(Request $request)
    {
      $this->validate($request,[
        'oldpassword'=>'required',
        'password'=>'required|confirmed|min:5'
      ],['required'=>'Form ini harus diisi','confirmed'=>'konfirmasi password harus sama dengan password baru']);
      $hashedPassword=Auth::user()->password;
      if (Hash::check($request->oldpassword,$hashedPassword)) {
        $user=user::find(Auth::user()->id);
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('successMSG','Password Telah diubah');
    
      }
      else{
        return redirect()->back()->with('errorMSG','Password tidak sama dengan password lama');
      }
    }
}
