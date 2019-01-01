<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        return view('users.user', [
            'user' => User::findOrFail($id),
        ]);
    }
}
