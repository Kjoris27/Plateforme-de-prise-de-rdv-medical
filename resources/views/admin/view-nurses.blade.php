@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Nurses</h1>

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
            @foreach ($nurses as $nurse)
                <tr>
                    <td>{{ $nurse->id }}</td>
                    <td>{{ $nurse->name }}</td>
                    <td>{{ $nurse->email }}</td>
                    <!-- Autres colonnes à ajouter en fonction des informations que vous souhaitez afficher -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
