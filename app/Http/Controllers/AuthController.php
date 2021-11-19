<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginHandler(Request $request)
    {
        $user = $this->user->where('email', $request->email)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                return redirect()->to('/dashboard');
            }
        }
        session()->flash('fail', 'Login failed, check your email or password!');
        return back();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'min:5', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $new_password = password_hash($request->password, PASSWORD_DEFAULT);
        $new_user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $new_password,
        ]);
        return redirect()->to('/login');
    }
}
