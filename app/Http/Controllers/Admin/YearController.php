<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\YearCreateRequest;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.years.index',
        [
            'years' => Year::paginate(3)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YearCreateRequest $request)
    {
        Year::create($request->validated());
        return to_route('admin.year.index')->with('Success' , 'L\'année a bien été créée');
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
    public function edit(Year $year)
    {
        return view('admin.years.edit' ,
        [
            'year' => $year
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YearCreateRequest $request , Year $year)
    {
        $year->update($request->validated());
        return to_route('admin.year.index')->with('Succes' , 'Année mis à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        $year->delete();
        return to_route('admin.year.index')->with('Success', 'Année est supprimée avec succès');
    }
}
