<?php

namespace App\Http\Controllers\Panel;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.customers.index', ['customers' => Customer::all()]);        
    }      

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store.customer.register.form');
    }

    // Processa o cadastro do cliente
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($customer);

        return redirect()->route('store.dashboard')->with('success', 'Cadastro realizado com sucesso!');
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
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
