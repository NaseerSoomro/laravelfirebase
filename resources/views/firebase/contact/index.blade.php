@extends('firebase.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <h3 class="alert alert-warning mb-2"> {{ session('status') }} </h3>
                @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3> Contacts List </h3>
                    <a href="{{ url('create-contact') }}" class="btn btn-sm- btn-primary">Add Contact</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Full Name </th>
                                <th> Email </th>
                                <th> Password </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $s_no = 0;
                            @endphp
                            @forelse ($collection as $key => $value)  
                                <tr>
                                    <td> {{ ++$s_no }} </td>
                                    <td> {{ $value['first_name'] }} {{ $value['last_name'] }} </td>
                                    <td> {{ $value['email'] }} </td>
                                    <td> {{ $value['password'] }} </td>
                                    <td> <a href="#" class="btn btn-sm btn-success">Edit</a> </td>
                                    <td> <a href="#" class="btn btn-sm btn-danger">Delete</a> </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan=7> No Record Found </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection