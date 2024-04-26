@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Nurse</h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.addNurse') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <input type="hidden" name="role" value="nurse">
        <button type="submit" class="btn btn-primary">Add Nurse</button>
    </form>
</div>
@endsection
