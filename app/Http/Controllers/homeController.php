<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class homeController extends Controller
{
    public function index()
    {
        return view('admin.home.home_view');
    }
}
