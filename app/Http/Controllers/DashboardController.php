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
    public function user_page()
    {
        return view('dashboard.user_page');
    }
    public function user_performance()
    {
        return view('dashboard.user_performance');
    }
    public function display_machine_call()
    {
        return view('dashboard.display_machine_call');
    }
    public function display_quality_call()
    {
        return view('dashboard.display_quality_call');
    }
    public function display_material_call()
    {
        return view('dashboard.display_material_call');
    }
    public function display_spv_call()
    {
        return view('dashboard.display_spv_call');
    }
    public function display_progress()
    {
        return view('dashboard.diplay_progress');
    }
}
