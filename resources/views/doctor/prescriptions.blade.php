@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prescriptions List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Disease</th>
                <th>Allergies</th>
                <th>Prescription</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctorPatients as $patient)
                <tr>
                    <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
                    <td>{{ $patient->prescriptions->isEmpty() ? 'N/A' : $patient->prescriptions[0]->disease }}</td>
                    <td>{{ $patient->prescriptions->isEmpty() ? 'N/A' : $patient->prescriptions[0]->allergy }}</td>
                    <td>{{ $patient->prescriptions->isEmpty() ? 'N/A' : $patient->prescriptions[0]->prescription }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
