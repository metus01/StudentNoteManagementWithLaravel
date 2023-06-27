<?php

namespace App\Http\Controllers;

use App\Models\Fil;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Mail\TestMail;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            Mail::to('mcmetus46@gmail.com')->send(new TestMail());
            if(Auth::check()){
                $user_id = Auth::id();
                $user  = User::findOrFail($user_id);
                if($user->is_admin == true)
                {
                    $request->session()->regenerate();
                    return redirect()->route('admin.fil.index')->with('success' , "Bon retour Admin ");
                }
                elseif($user->is_prof == true)
                {
                    $request->session()->regenerate();
                    return redirect()->route('prof.home' ,
                    [
                        'username' => $user->name
                    ])->with('success' , 'Bon retour prof '.$user->name);
                }else
                {
                    $request->session()->regenerate();
                    return redirect()->route('etudiant.home',
                    [
                        'username' => $user->name
                    ]
                    )->with('success' , 'Bon retour prof '.$user->name);

                }
            }
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
      $user =   User::create(
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
            //$user->notify(new UserRegisteredNotification());
        return to_route('auth.login')->with('success' , 'You sign up successfuly , let login now');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success' , 'Logout Successfuly');
    }
}
