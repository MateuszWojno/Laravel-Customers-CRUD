@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">

        <form action="{{ route('customers.add') }}" method="get" novalidate>
            <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" name="first_name" value=""/>
                <label class="form-label" for="form4Example1">First name</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" name="last_name" value=""/>
                <label class="form-label" for="form4Example1">Last name</label>
            </div>

            <div class="form-outline mb-4">
                <input type="email" id="form4Example2" class="form-control" name="email" value=""/>
                <label class="form-label" for="form4Example2">Email address</label>
            </div>

            <div class="form-outline mb-4">
                <input type="number" id="form4Example2" class="form-control" name="phone_number" value=""/>
                <label class="form-label" for="form4Example2">Phone number</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>
            @method('get')
            @csrf
        </form>
    </div>
@endsection
