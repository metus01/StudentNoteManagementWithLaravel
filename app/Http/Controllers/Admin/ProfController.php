<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::all();
        return view('admin.profs.index',
        [
            'profs' => $query->whereStrict('is_prof' , 1),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profs.create');
    }
    public function home()
    {
        return view('profs.home');
    }
    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $prof):View
    // {
    //     return view('admin.profs.edit',
    //     [
    //         'prof' => $prof
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UserCreateRequest $request, User $prof)
    // {
    //     $prof->update(
    //         [
    //             'is_prof' => $request->is_prof
    //         ]
    //         );
    //     return to_route('admin.prof.index')->with('Succes' , 'Année mis à jour avec success');
    // }

}
