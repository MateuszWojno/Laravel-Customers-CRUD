@extends('layouts.app')

@section('content')

    <section style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">
                            <h4 class="text-center my-3 pb-3">List of customers</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Name customer</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($customers as $customer)
                                        <th scope="row">{{ $customer->id }}</th>
                                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        <td><a href="{{ route('customers.show', ['customer' => $customer->id]) }}" class="btn btn-success" role="button">Details</a></td>
                                        <td><a href="#" class="btn btn-info" role="button">Update</a></td>
                                        <td><a href="#" class="btn btn-danger" role="button">Delete</a></td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
