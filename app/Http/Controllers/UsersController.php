<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function settings()
    {
        return view('users.account', [
            'user' => User::findOrFail(Auth::id()),
        ]);
    }

    public function show($id)
    {
        return view('users.user', [
            'user' => User::findOrFail($id),
        ]);
    }

    public function update()
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:255',
        ]);
    }
}
