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

    }

    public function store()
    {

    }

    public function show(Customer $customer)
    {
        return view('customer', compact('customer'));
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
