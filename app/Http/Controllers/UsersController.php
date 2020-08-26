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

}
