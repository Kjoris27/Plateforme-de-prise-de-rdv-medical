@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Patients</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Age</th>
                <!-- Autres colonnes à ajouter en fonction des informations que vous souhaitez afficher -->
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->lastname }}</td>
                    <td>{{ $patient->firstname }}</td>
                    <td>{{ $patient->age }}</td>
                    <!-- Autres colonnes à ajouter en fonction des informations que vous souhaitez afficher -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
