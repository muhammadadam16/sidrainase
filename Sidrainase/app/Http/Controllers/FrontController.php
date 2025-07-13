<?php

namespace App\Http\Controllers;

use view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\salurandrainase;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function peta()
    {
        return view('front.peta');
    }
}