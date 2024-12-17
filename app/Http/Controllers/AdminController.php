<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
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
