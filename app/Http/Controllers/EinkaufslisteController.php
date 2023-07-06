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

            'listen' => Einkaufsliste::with('user:id,name')->orderBy("id", "DESC")->get(),

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

            'message' => 'required|string|max:255',

        ]);

 

        $request->user()->listen()->create($validated);

 

        return redirect(route('listen.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Einkaufsliste $einkaufsliste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Einkaufsliste $einkaufsliste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Einkaufsliste $einkaufsliste): RedirectResponse
    {
        $this->authorize('update', $einkaufsliste);

 

        $validated = $request->validate([

            'message' => 'required|string|max:255',

        ]);

 

        $einkaufsliste->update($validated);

 

        return redirect(route('listen.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Einkaufsliste $einkaufsliste)
    {
        //
    }
}
