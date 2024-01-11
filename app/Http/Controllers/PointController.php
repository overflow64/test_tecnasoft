<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $points = Point::orderBy("id","asc")->paginate(5);
        return view('points.index',compact('points'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('points.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nome' => 'required',
            'indirizzo' => 'required',
            'descrizione' => 'required',
            'mappa' => 'required',
        ]);
        Point::create($request->all());
        return redirect()->route('points.index')
                        ->with('success','Point inserito correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        return view('points.addservice',compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point) : View
    {
        return view('points.edit',compact('point'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Point $point) : RedirectResponse
    {
        $request->validate([
            'nome' => 'required',
            'indirizzo' => 'required',
            'descrizione' => 'required',
            'mappa' => 'required',
        ]);

        $point->update($request->all());
        return redirect()->route('points.index')
                        ->with('success','Point modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point) : RedirectResponse
    {
        $point->delete();
        return redirect()->route('points.index')->with('success','Point correttamente eliminato');
    }

    /**
     
     */
   
}
