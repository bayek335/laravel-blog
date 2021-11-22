<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
