<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {   
        $customers = Customer::orderBy("id","asc")->paginate(5);
        return view('customers.index',compact('customers'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'cognome' => 'required',
            'nome' => 'required',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success','Customer correttamente inserito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer) : View
    {
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer) : RedirectResponse
    {
        $request->validate([
            'cognome' => 'required',
            'nome' => 'required',
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success','Customer Modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer) : RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success','Customer cancellato');
    }
}
