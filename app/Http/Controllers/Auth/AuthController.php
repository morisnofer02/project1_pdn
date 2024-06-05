<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function index(){
        return view ('auth/login');
    }

    public function register(){
        return view ('auth/register');
    }

    public function registerPost(RegisterRequest $r){
        // cek validasi berdasarkan rule yang ada di request
        if($r->validated()){
            // jika ada gambar yang di inputkan maka cek dulu gambarnya
            $foto = $r->foto->getClientOriginalName();
            // jika gambar sesuai dengan rule maka masukkan gambar ke folder user
            $r->foto->move('users/',$foto);

            // sesudah ngecek foto maka selanjutnya ambil inputan user dan masukkan ke table user
            User::create([
                'name' => $r->name,
                'email' => $r->email,
                'username' => $r->username,
                'password' => $r->password,
                'foto' => $foto,
                'role' => 'user'
            ]);
            // selanjutnya arahkan user ke halaman login
            return redirect('login')->with('pesan','Registrasi berhasil');
        }
    }

    public function loginPost(LoginRequest $l){
        // cek apakah data yang diinputkan lolos dari validasi loginRequest
        if($l->validated()){
            // cek apakah ada username pada table user
            $user = \App\Models\User::where('username',$l->username)->first();

            // cek jika email belum terdaftar, jika tidak ada maka kirim pesan kesalahan
            if(!$user){
                // kembalikan ke halaman sama, lalu munculkan pesan error
                return back()->with('pesan', 'Username belum terdaftar');
            }

            // cek jika username dan password terdaftar
            if(Auth::guard('web')->attempt(['username' => $l->username, 'password' => $l->password])){
                // cek rolenya jika admin redirect ke dashoard, jika user redirect ke home
                if($user->role == 'admin'){
                    return redirect('dashboard')->with('pesan', 'Welcome to dashboard');
                }else{
                    return redirect('/')->with('pesan', 'Welcome to WMF Store!');
                }
            }else {
                // jika ada username tapi salah memasukka password
                return back()->with('pesan', 'Username / Password salah');
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('pesan', 'Anda berhasil logout');
    }
}