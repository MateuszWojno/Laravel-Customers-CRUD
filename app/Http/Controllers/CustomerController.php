<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers', [
            'customers' => Customer::all()
        ]);
    }

    public function add()
    {
        return view('add');
    }

    public function store()
    {
    }

    public function show(Customer $customer)
    {
        return view('customer', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('edit', compact('customer'));
    }

    public function update()
    {

    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('deleteMessage', ' successfully deleted');
    }
}
