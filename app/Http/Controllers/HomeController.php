<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->route('esdeveniments.index');
    }
}
