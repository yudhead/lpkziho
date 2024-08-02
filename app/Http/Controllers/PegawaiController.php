<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PegawaiController extends Controller
{
    public function dashboard()
    {
        // Logika untuk menampilkan dashboard untuk pegawai
        return view('admins.dashboard');
    }
}
