<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Service;
use Illuminate\View\View;
use App\Models\PointService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class PointServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Point $point) : View
    {
        //restituisco collection della realzione invece che la relazione stessa
        $services = Service::all();
        $pointServices = $point->services;
        return view('points.services.index',compact('point','services','pointServices'));

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
    public function store(Request $request, Point $point)
    {
        $point->services()->attach($request->input('service_id'),['price_point'=> $request->input('price_point')]);
        //return redirect()->route('points.services.index',$point)->with('success','Servizio abbinato correttamente');
        return to_route('points.services.index', ['point' => $point])->with('success','Servizio abbinato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(PointService $pointService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PointService $pointService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PointService $pointService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PointService $pointService)
    {
        //
    }

    public function status(Point $point, Service $service){
        $service = $point->services()->find($service);
       // dd($service->pivot->is_active == false);
        $service->pivot->is_active == false ? $point->services()->updateExistingPivot($service, ['is_active' => 1]) : $point->services()->updateExistingPivot($service, ['is_active' => 0]);
        
        return to_route('points.services.index', ['point' => $point])->with('success','Status modificato correttamente');
    }
}
