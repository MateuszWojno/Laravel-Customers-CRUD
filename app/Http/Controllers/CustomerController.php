<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\User;
use App\Notifications\EmailNotification;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customers', [
            'customers' => Customer::orderBy('id', 'DESC')->get()
        ]);
    }

    public function add()
    {
        return view('add');
    }

    public function store(CustomerRequest $request)
    {
        $users = User::where('role', 'Admin')->get();

        $customer = [
            'greeting'     => 'Hi Admin, this customer join to our platform',
            'first_name'   => 'First name: ' . $request->input('first_name'),
            'last_name'    => 'Last name: ' . $request->input('last_name'),
            'email'        => 'Email: ' . $request->input('email'),
            'phone_number' => 'Phone number: ' . $request->input('phone_number'),
            'actionText'   => 'View list of customers',
            'actionURL'    => url('/customers'),
            'thanks'       => 'Thank you '
        ];

        foreach ($users as $user) {
            $user->notify(new EmailNotification($customer));
        }

        Customer::create($request->validated());

        return redirect()->route('customers.index')->with('createMessage', 'Customer successfully created');
    }

    public function show(Customer $customer)
    {
        User::where('role', 'Admin')->exists();

        return view('customer', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();
        $customer->fill($data);
        $customer->save();

        return redirect()->route('customers.index')->with('updateMessage', 'Customer data successfully updated');
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('deleteMessage', ' successfully deleted');
    }
}
