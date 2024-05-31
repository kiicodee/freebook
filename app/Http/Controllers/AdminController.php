<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        echo "selamat datang";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo  "<h2> kamu adalah " . Auth::user()->role . "</h2>";
        echo "<a href='logout'> Logout </a>";
    }
}
