<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    public function create()
    {
        return view('users.edit');
    }

    public function role()
    {
        return view('users.role');
    }
}
