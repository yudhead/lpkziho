<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('user.dashboard_user', compact('user')); // Mengirim data pengguna ke view
    }
}
