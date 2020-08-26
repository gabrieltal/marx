<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view("users.show", ["user" => $user]);
    }

    public function edit()
    {
        return view("users.edit", ["user" => auth()->user()]);
    }

    public function update()
    {
        $user = auth()->user();
        $user->update($this->validateUser());
        return redirect($user->path())->with("message", "Updated your profile!");
    }

    protected function validateUser()
    {
        return request()->validate([
            "username" => ['required', 'string', 'max:20', 'unique:users,username,'.auth()->user()->id.',id', 'alpha_dash'],
            "name" => ['required', 'string', 'max:255'],
            "bio" => ['required', 'string']
        ]);
    }
}
