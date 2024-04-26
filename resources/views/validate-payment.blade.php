@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validation du Paiement pour {{ $patient->firstname }} {{ $patient->lastname }}</h1>

    <form action="{{ route('patient.completePayment', $patient->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="payment_option">Option de paiement</label>
            <select name="payment_option" id="payment_option" class="form-control">
                <option value="T-money">T-money</option>
                <option value="Flooz">Flooz</option>
                <option value="Carte bancaire">Carte bancaire</option>
                <option value="Liquide">Liquide</option>
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>
@endsection
