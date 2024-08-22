<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //vistas de admin y client
    public function clientIndex()
    {
        return view('client.index');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
