<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Requests;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['show','create','store']
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:50', 'email' => 'required|email|unique:users|max:255', 'password' => 'required|confirmed|min:6']);
        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password),]);
        Auth::login($user);
        session()->flash('success', '欢迎');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, ['name' => 'required|max:50', 'password' => 'nullable|confirmed|min:6']);
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.show', $user->id);
    }
}
