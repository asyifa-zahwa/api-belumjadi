<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            'username' => ['alpha_num', 'required', 'min:3', 'max:25', 'unique:users,username'],
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);
        User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        return response('thank you, you are registered');
    }
}
