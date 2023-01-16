@extends('layouts.app')

@section('content')

    <section style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">
                            <h4 class="text-center my-3 pb-3">List of customers</h4>
                            <div>
                                <a href="{{ route('customers.add') }}"
                                   class="btn btn-secondary" role="button">Add customer</a>
                            </div>

                            @if(session('deleteMessage'))
                                <h1 class="text-dark text-center bg-success"> {{ session('deleteMessage') }}</h1>
                            @endif
                            @if(session('createMessage'))
                                <h1 class="text-dark text-center bg-success"> {{ session('createMessage') }}</h1>
                            @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name customer</th>
                                    @if(auth()->user()->isAdmin())
                                        <th scope="col">Details</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($customers as $customer)
                                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        @if(auth()->user()->isAdmin())
                                            <td><a href="{{ route('customers.show', ['customer' => $customer->id]) }}"
                                                   class="btn btn-success" role="button">Details</a></td>

                                            <td><a href="{{ route('customers.edit', ['customer' => $customer->id]) }}"
                                                   class="btn btn-info" role="button">Update</a></td>
                                            <form
                                                action="{{ route('customers.delete', ['customer' => $customer->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <td><input class="btn btn-danger" type="submit" value="Delete"/></td>
                                                @endif
                                            </form>


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
