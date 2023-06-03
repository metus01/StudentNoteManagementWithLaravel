<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilCreateRequest;

class FilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fils.index',
        [
            'fils' => Fil::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fils.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilCreateRequest $request)
    {

        Fil::create($request->validated());
        return to_route('admin.fil.index')->with('Success' , 'La filière a bien été créée');
    }
    /**
     * Display the specified resource.
     */
    public function show(Fil $fil)
    {
        return view('admin.fils.show' ,
        [
            'fil' => $fil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fil $fil)
    {
        return view('admin.fils.edit',
        [
            'fil' => $fil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilCreateRequest $request, Fil $fil)
    {
        $fil->update($request->validated());
        return to_route('admin.fil.index')->with('Succes' , 'Filière mis à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fil $fil)
    {
        $fil->delete();
        return to_route('admin.fil.index')->with('Success', 'La filière est supprimée avec succès');
    }
}
