<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'display_name' => 'string|max:32',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            //'new_password' => 'string|min:6|different:password',
            ]);

        //Update image if new one provided
        if (null !== $request->image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);

            $user->image = $imageName;
        }

        //Update rest if set.
        strlen($request->display_name) > 0 ? $user->display_name = $request->display_name : '';
        strlen($request->new_password) > 0 ? $user->password = Hash::make($request->new_password) : '';

        $user->save();

        return redirect('user/'.Auth::id());
    }
}
