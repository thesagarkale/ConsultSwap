<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request): View
    {
        return view('dashboard');
    }
}
