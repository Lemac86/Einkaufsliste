<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Einkaufsliste;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Einkaufsliste $liste): RedirectResponse
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

        ]);

 

        $liste->artikel()->create([
            "name" => $validated["name"],
            "user_id" => $request->user()->id
        ]);

 

        return redirect(route('liste.show', $liste->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $this->authorize('delete', $artikel);


        $artikel->delete();
 

        return redirect(route('liste.index'));
    }
}
