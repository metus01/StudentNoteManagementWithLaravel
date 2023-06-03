<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatCreateRequest;
use App\Models\Mat;
use Illuminate\Http\Request;

class MatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mats.index',
        [
            'mats' => Mat::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatCreateRequest $request)
    {
        Mat::create($request->validated());
        return to_route('admin.mat.index')->with('Success' , 'La filière a bien été créée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mat $mat)
    {

        return view('admin.mats.edit',
        [
            'mat' => $mat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatCreateRequest $request, Mat $mat)
    {
        $mat->update($request->validated());
        return to_route('admin.mat.index')->with('Succes' , 'Filière mis à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mat $mat)
    {
        $mat->delete();
        return to_route('admin.fil.index')->with('Success', 'La filière est supprimée avec succès');
    }
}
