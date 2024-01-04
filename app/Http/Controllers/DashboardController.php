<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function display()
    {
        return view('dashboard.display');
    }

    public function display_zone()
    {
        return view('dashboard.display_zone');
    }

    public function display_zone_if_report()
    {
        return view('dashboard.display_zone_if_report');
    }
}
