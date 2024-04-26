@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctor Appointments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Observation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctorPatients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
                    <td>{{ $patient->sexe }}</td>
                    <td>{{ $patient->observation }}</td>
                    <td>
                        <a href="{{ route('appointment.prescribe', $patient->id) }}"><button type="submit" class="btn btn-primary">Prescribe</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

