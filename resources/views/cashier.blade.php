@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cashier Dashboard</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Code de consultation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->lastname }}</td>
                    <td>{{ $patient->firstname }}</td>
                    <td>{{ $patient->consultation_code }}</td>
                    <td>
                        <a href="{{ route('patient.validatePaymentForm', $patient->id) }}" class="btn btn-primary">Valider le paiement</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(Session::has('payment_success'))
    <div class="alert alert-success" role="alert">
        Paiement validé avec succès.
    </div>
    @endif

    @if(Session::has('payment_confirmation'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('payment_confirmation') }}
        </div>
    @endif

</div>
@endsection
