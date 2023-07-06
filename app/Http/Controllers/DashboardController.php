<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        
        return view('dashboard', [
            'user' => Auth::user(),
            'balance' => Balance::where('user_id', Auth::user()->id)->first(),
            'histories' => History::where('user_id', Auth::user()->id)->latest('created_at')->get()
        ]);
    }
}
