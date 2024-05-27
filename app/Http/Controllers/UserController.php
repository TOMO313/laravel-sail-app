<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function user(User $user)
    {
        $userId = Auth::id();
        $users = User::where('id', '!=', $userId)->get();
        return view('users.index')->with(['users' => $users]);
    }
}
