<?php

namespace App\Http\Controllers;

use App\Models\salurandrainase;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
      $data = array(
        "title"   => "dashboard",
        "menudashboard" => "active",
      "jumlahUser" => User::count(),
      "jumlahAdmin" => User::where('status','Admin')->count(),
      "jumlahKaryawan" => User::where('status','Karyawan')->count(),
      );

      return view('dashboard', $data);  
    }
}