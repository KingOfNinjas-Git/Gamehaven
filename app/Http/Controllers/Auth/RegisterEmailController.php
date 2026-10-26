<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RegisterEmailController extends Controller
{
    public function show()
    {
        return view('auth.register-email');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'nif' => 'required',
            'first_name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'birthdate' => 'required|date_format:d/m/Y',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nif' => $request->nif,
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'birthdate' => Carbon::createFromFormat('d/m/Y', $request->birthdate)->format('Y-m-d'),
            'name' => $request->first_name . ' ' . $request->surname,
        ]);

        Auth::login($user);

        return redirect('/home');
    }
}
