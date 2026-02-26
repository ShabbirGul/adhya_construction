<?php

namespace App\Http\Controllers;

use App\Models\User; // 👈 IMPORTANT (import model)

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        ]);

        return redirect('/users')->with('success', 'User created successfully!');
    }
}