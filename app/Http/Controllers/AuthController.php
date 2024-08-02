<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Coba login menggunakan tabel 'users' terlebih dahulu
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->redirectUserBasedOnRole($user);
        }
    
        // Jika tidak berhasil, coba login menggunakan tabel 'pendaftaran'
        $userPendaftaran = Pendaftaran::where('email', $request->email)->first();
    
        if ($userPendaftaran && Hash::check($request->password, $userPendaftaran->password)) {
            session(['pendaftaran_user' => $userPendaftaran]);
            // Simpan data ke session secara manual
            session(['siswa' => $userPendaftaran]);
    
            return redirect()->route('user.dashboard');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    private function redirectUserBasedOnRole($user)
    {
        if ($user->role == 'pegawai') {
            return redirect()->route('admins.dashboard');
        } elseif ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
