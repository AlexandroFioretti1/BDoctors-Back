<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->get();

        return view('dashboard', compact('messages'));
    }
}