<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'address' => 'required|max:20',
            'nip' => 'required|digits:10'
        ]);
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->nip = $request->nip;

        $customer->save();

        return redirect()->route("customers.index")->with('message', 'Klient dodany poprawnie.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::with('invoices')->where('id', $id)->firstOrFail();

        return view('customers.single', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer=Customer::find($id);
        return view ('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->nip = $request->nip;

        $customer->save();

        return redirect()->route("customers.index")->with('message', 'Nadpisano dane klienta.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::destroy($id);
        
        return redirect()->route("customers.index")->with('message', 'Usunięto klienta.');
    }
}
