<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\MinatBakat;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalUsers = DB::table('users')->count();
    $verifiedUsers = DB::table('users')->whereNotNull('email_verified_at')->count();
    $unverifiedUsers = DB::table('users')->whereNull('email_verified_at')->count();
    $adminUsers = DB::table('users')->where('role', 'admin')->count();
    $userUsers = DB::table('users')->where('role', 'user')->count();

    // Tambahkan data minat bakat dan jurusan
    $totalMinatBakat = DB::table('minat_bakats')->count();
    $totalJurusan = DB::table('jurusans')->count();

    return view('admin.dashboard', compact(
        'totalUsers', 
        'verifiedUsers', 
        'unverifiedUsers', 
        'adminUsers', 
        'userUsers', 
        'totalMinatBakat', 
        'totalJurusan'
    ));
}


    

    public function minat_bakat()
    {
        return view('admin.minat_bakat');
    }
    public function jurusan()
    {
        return view('admin.jurusan');
    }
}
