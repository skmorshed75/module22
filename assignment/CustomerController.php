<?php

// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'contact_number' => 'nullable|string|max:20',
        ]);

        Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'contact_number' => 'nullable|string|max:20',
        ]);

        $customer->update($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }


    public function index(Request $request)
    {
        $searchQuery = $request->input('q');
    
        $customers = Customer::where('name', 'like', "%$searchQuery%")
                    ->orWhere('email', 'like', "%$searchQuery%")
                    ->orWhere('contact_number', 'like', "%$searchQuery%")
                    ->get();
    
        return view('customers.index', compact('customers', 'searchQuery'));
    }    
}

