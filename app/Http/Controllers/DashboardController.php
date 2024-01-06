<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function display_zone()
    {
        return view('dashboard.display');
    }

    public function display_zone_if_report_1()
    {
        return view('dashboard.display_zone_if_report_1');
    }
    public function display_zone_if_normal_1()
    {
        return view('dashboard.display_zone_if_normal_1');
    }

    public function display_zone_if_report_2()
    {
        return view('dashboard.display_zone_if_report_2');
    }
    public function display_zone_if_normal_2()
    {
        return view('dashboard.display_zone_if_normal_2');
    }
    public function user_page()
    {
        return view('dashboard.user_page');
    }
    public function user_performance()
    {
        return view('dashboard.user_performance');
    }
}
