@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Doctors</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Autres colonnes à ajouter en fonction des informations que vous souhaitez afficher -->
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <!-- Autres colonnes à ajouter en fonction des informations que vous souhaitez afficher -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
