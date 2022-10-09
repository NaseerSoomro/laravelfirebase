@extends('firebase.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3> Edit Contact </h3>
                    <a href="{{ url('contacts') }}" class="btn btn-sm- btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-contact/'.$key) }}" method="POST">
                    @csrf
                    <div class="form-group m-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $editData['first_name']}}">
                    </div>
                    <div class="form-group m-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $editData['last_name'] }}">
                    </div>
                    <div class="form-group m-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $editData['email'] }}">
                    </div>
                    <div class="form-group m-3">
                        <label>Password </label>
                        <input type="password" class="form-control" name="password" value="{{ $editData['password'] }}">
                    </div>
                    <div class="form-group m-3">
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection