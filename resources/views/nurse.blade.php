@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Welcome to the nurse dashboard.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Patients list</h1>
    <div>
        <a href="{{ route('create') }}" class="btn btn-primary">Add Patient</a>
    </div>
</div>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Last name</th>
            <th>First name</th>
            <th>Age</th>
            <th>Birthday</th>
            <th>Occupation</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->lastname }}</td>
            <td>{{ $patient->firstname }}</td>
            <td>{{ $patient->age }}</td>
            <td>{{ $patient->birthday }}</td>
            <td>{{ $patient->occupation }}</td>
            <td>
                <!-- Ajoutez les liens pour voir, éditer et supprimer le patient en utilisant les routes appropriées -->
                <a href="{{ route('view', $patient->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>

                <a href="{{ route('edit', $patient->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                <form action="{{ route('delete', $patient->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
