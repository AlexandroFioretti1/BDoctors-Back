<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->get();

        $unreadMessages = Message::where('user_id', $user->id)->where('read', 0)->get();

        return view('dashboard', compact('messages', 'unreadMessages'));
    }
}