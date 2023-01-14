@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">

        <form action="{{ route('customers.store') }}" method="POST" novalidate>
            <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" name="first_name" value=""/>
                <label class="form-label" for="form4Example1">First name</label>
                @error('first_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" name="last_name" value=""/>
                <label class="form-label" for="form4Example1">Last name</label>
                @error('last_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <input type="email" id="form4Example2" class="form-control" name="email" value=""/>
                <label class="form-label" for="form4Example2">Email address</label>
                @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <input type="number" id="form4Example2" class="form-control" name="phone_number" value=""/>
                <label class="form-label" for="form4Example2">Phone number</label>
                @error('phone_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

    <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>
    @method('POST')
    @csrf
    </form>
    </div>
@endsection
