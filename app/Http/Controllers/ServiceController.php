<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $services = Service::orderBy("id","asc")->paginate(5);
        
        return view('services.index',compact('services'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nome' => 'required',
        ]);

        Service::create($request->all());
        return redirect()->route('services.index')
                        ->with('success','Servizio inserito correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service) : View
    {
        
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service) : RedirectResponse
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $service->update($request->all());
        return redirect()->route('services.index')
                        ->with('success','Servizio modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service) : RedirectResponse
    {
        $service->delete();
         
        return redirect()->route('services.index')
                        ->with('success','Service cancellato');
    }
}
