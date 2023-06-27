<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        // User::create(
        //     [
        //         'email' => 'mucuX@gmail.com',
        //         'password' => Hash::make('$mucux777$'),
        //         'is_admin' => 1
        //     ]
        //     );
        return view('home');
    }
}
