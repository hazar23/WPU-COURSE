<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('siswa/home');
    }

    public function dashboard(Request $request)
    {
        if ($request->session()->has('email')) {
            return view('dashboard/index');
        }else{
            return redirect('/login');
        }
    }
}
