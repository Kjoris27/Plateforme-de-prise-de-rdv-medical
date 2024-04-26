@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Patient</h1>
    <hr />
    <form action="{{ route('update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Afficher les champs existants avec leurs valeurs actuelles -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="{{ $patient->lastname }}" required>
            </div>
            <div class="col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="{{ $patient->firstname }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" placeholder="Age" value="{{ $patient->age }}" required>
            </div>
            <div class="col-md-6">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $patient->birthday }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" id="sexe" class="form-control" value="{{ $patient->sexe }}" required>
                    <option value="Féminin">Féminin</option>
                    <option value="Masculin">Masculin</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Telephone" value="{{ $patient->telephone }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Occupation" value="{{ $patient->occupation }}" required>
            </div>
        </div>
        <!-- Deuxième partie du formulaire -->
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="temperature" class="form-label">Temperature</label>
                <input type="number" name="temperature" id="temperature" class="form-control" step="0.01" placeholder="Temperature" value="{{ $patient->temperature }}" required>
            </div>
            <div class="col-md-6">
                <label for="weight" class="form-label">Weight</label>
                <input type="number" name="weight" id="weight" class="form-control" step="0.01" placeholder="Weight" value="{{ $patient->weight }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="taille" class="form-label">Taille</label>
                <input type="text" name="taille" id="taille" class="form-control" placeholder="Taille" value="{{ $patient->taille }}">
            </div>
            <div class="col-md-6">
                <label for="tension" class="form-label">Tension</label>
                <input type="text" name="tension" id="tension" class="form-control" placeholder="Tension" value="{{ $patient->tension }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="observation" class="form-label">Observation</label>
                <textarea name="observation" id="observation" class="form-control" placeholder="Observation" value="{{ $patient->observation }}"></textarea>
            </div>
        </div>


        <!-- Ajout du champ pour sélectionner l'infirmière -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="nurse_name" class="form-label">Nurse Name</label>
                <input type="text" id="nurse_name" class="form-control" value="{{ $nurse->name }}" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
