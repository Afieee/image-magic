<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required',
            'password' => 'required|min:8|max:255'
        ],[
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama harus memiliki minimal 3 karakter',
            
            'email.required' => 'Email harus diisi',

            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal memili minimal 8 karakter'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Akun Berhasil Dibuat');
    } 
    
    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            $request->session()->put('user', $user);

            return redirect()->route('halaman-home');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah'
        ]);
    }

    public function halamanHome(Request $request)
    {
        $user = $request->session()->get('user');
        return view('home', ['user' => $user]);
    }
}
