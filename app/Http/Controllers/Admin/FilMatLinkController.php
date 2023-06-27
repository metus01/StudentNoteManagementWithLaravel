<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fil;
use App\Models\FilMat;
use App\Models\FilMatLink;
use App\Models\Mat;
use Illuminate\Support\Facades\Redirect;

class FilMatLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $fils = Fil::find(2);
    //     return view('admin.links.index',
    // [
    //     'fils' => $fils
    // ]);
    // return view('admin.links.index',
    // [

    // ]
    // );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fils = Fil::pluck('name', 'id');
        $mats = Mat::pluck('name', 'id');
        return view(
            'admin.links.create',
            [
                'fils' => $fils,
                'mats' => $mats
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'credit' => 'required',
                'masse_horaire' => 'required'
            ]
        );
        // $fil = Fil::find($request->fil[0]);
        // $fil->mats()->attach($request->mat[0], [
        //     'credit' => $request->credit,
        //     'masse_horaire' => $request->masse_horaire,
        //     'observations' => $request->observations
        // ]);
        FilMatLink::create(
            [
                'fil_id' => $request->fil[0],
                'mat_id' => $request->mat[0],
                'credit' => $request->credit,
                'masse_horaire' => $request->masse_horaire
            ]
            );
        return to_route('admin.fil.index')->with('success' , 'Liaison ajoutée avec success');

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
    public function edit(FilMatLink $link)
    {
        //$link = FilMatLink::findOrFail($link_id);
        $fils = Fil::pluck('name', 'id');
        $mats = Mat::pluck('name', 'id');
        return view('admin.links.edit',
        [
            'link' => $link,
            'fils' => $fils,
            'mats' => $mats
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FilMatLink $link)
    {
        $request->validate(
            [
                'credit' => 'required',
                'masse_horaire' => 'required'
            ]
            );
            $link->update(
                [
                    'fil_id' => $request->fil[0],
                    'mat_id' => $request->mat[0],
                    'credit' => $request->credit,
                    'masse_horaire' => $request->masse_horaire
                ]
            );
            return to_route('admin.fil.index')->with('success' , 'Liaison modifiée  avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilMatLink $link)
    {
        $link->delete();
        return back()->with('success' , 'Liaison supprimée  avec success');

    }
}
