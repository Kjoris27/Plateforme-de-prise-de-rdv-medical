@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h4>Nom du patient :</h4>
                <p>{{ $patient->lastname }}</p>
                <h4>Prenom du patient :</h4>
                <p>{{ $patient->firstname }}</p>
                <h4>Age :</h4>
                <p>{{ $patient->age }} ans</p>
                <h4>Taille :</h4>
                <p>{{ $patient->taille }}</p>
                <h4>Tension artérielle:</h4>
                <p>{{ $patient->tension }} mmHg</p>
                <h4>Nom de l’infirmière :</h4>
                <p>{{ Auth::user()->name }}</p>
            </div>
            <div class="col-md-6">
                <h4>Poids :</h4>
                <p>{{ $patient->weight }} kg</p>
                <h4>Observations :</h4>
                <p>{{ $patient->observation }}</p>
                <h4>Médecin traitant</h4>
                @if ($patient->doctor)
                    <p>{{ $patient->doctor->name }}</p>
                @else
                    <p>Aucun médecin traitant</p>
                @endif
                <a href="{{ route('printTicket', $patient->id) }}" target="_blank">Imprimer le ticket de consultation</a>


            </div>

        </div>
    </div>
@endsection
