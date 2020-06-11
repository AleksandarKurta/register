<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        $user->delete();

        return back();
    }

    public function updateUser($id)
    {

        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($id);

        $user->update($data);

        return redirect('/users');
    }
}