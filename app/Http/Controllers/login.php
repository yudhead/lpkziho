<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class login extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required|email',
            'nama_ibu' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi!',
            'email.email' => 'Isikan Email Dengan Benar!',
            'nama_ibu.required' => 'password Wajib Diisi!',
        ]);
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->nama_ibu,
        ];
    
        if (Auth::attempt($infologin)) {
            $user = Auth::user();
    
            // Periksa peran pengguna
          
        } else {
            return redirect('login')->with('error', 'Email, Nama Ibu, atau Password Salah!');
        }
    }
    

    public function logout()
    {
        dd
        Auth::logout();
        return redirect('loginform');
    }
}
