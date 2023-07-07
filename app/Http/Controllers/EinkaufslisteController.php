<?php

namespace App\Http\Controllers;

use App\Models\Einkaufsliste;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response; 

class EinkaufslisteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response 
    {
        return Inertia::render('Einkaufslisten/Index', [

            'listen' => Einkaufsliste::with('user:id,name')->latest()->get(),

        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

        ]);

 

        $request->user()->listen()->create($validated);

 

        return redirect(route('liste.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Einkaufsliste $liste)
    {
        return Inertia::render('Einkaufslisten/Show', [

            'liste' => $liste->load('user:id,name', 'artikel', 'artikel.user:id,name'),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Einkaufsliste $liste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Einkaufsliste $liste): RedirectResponse
    {
        $this->authorize('update', $liste);

 

        $validated = $request->validate([

            'name' => 'required|string|max:255',

        ]);

 

        $liste->update($validated);

 

        return redirect(route('liste.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Einkaufsliste $liste): RedirectResponse
    {
        $this->authorize('delete', $liste);


        $liste->delete();
 

        return redirect(route('liste.index'));
    }
}
