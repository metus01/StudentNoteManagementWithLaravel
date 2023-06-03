<?php

namespace App\Http\Controllers;

use App\Models\Fil;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public  function login()
    {
        return view('auth.login');
    }
    public function doLogin(UserLoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.fil.index'));
        }
        return back()->withErrors(
            [
                'email' => 'Identifiants Incorrects'
            ]
            );
    }
    public function register()
    {
        $fils  = Fil::pluck('name', 'id');
        $years = Year::pluck('name' , 'id');
        return view('auth.register' ,
        [
            'fils' => $fils,
            'years' => $years
        ]);
    }
    public function doRegister(UserCreateRequest $request)
    {
        User::create(
            [
                // 'name' => $request->validate('required' , $request->input('name')),
                // 'lastname' => $request->validate('required' , $request->input('lastname')),
                // 'email' => $request->validate('required|email' , $request->input('email')),
                // 'password' => $request->validate('required|min:6' , $request->input('password')),
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'password'=> Hash::make($request->input('password')),
                'year_id' => $request->year[0],
                'fil_id' => $request->fil[0],
                'is_prof' => $request->is_prof,
                'is_admin' => false
            ]
            );
        return to_route('auth.login')->with('success' , 'You sign up successfuly , let login now');
    }
}
