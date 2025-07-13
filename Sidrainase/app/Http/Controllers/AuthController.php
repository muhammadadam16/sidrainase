<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth/login");
    }
    public function LoginProses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ],[
            'email.required' => 'Email Harus Di isi Tidak Boleh Kosong ',
            'password.required' => 'password Harus Di isi Tidak Boleh Kosong ',
            'password.min' => 'password minimal harus 8 karakter ',
        ]);

        $data = array(
            'email'=> $request->email,
            'password'=> $request->password,
        );

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('success','Anda Berhasil Masuk'); 
        } else {
            return redirect()->back()->with('error','Email atau Password Anda Salah');
        } 
    }
    public function logout(){
        Auth::logout();

        return redirect()->route('login')->with('success','Anda Berhasil Keluar');
}
}