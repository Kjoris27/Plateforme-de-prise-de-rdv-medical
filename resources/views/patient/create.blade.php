@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create new patients</h1>
        <hr />
        <div class="row">
            <div class="col-lg-6">
            <form action="{{ route('store') }}" method="POST" class="form-login">
            @csrf
            <input type="hidden" name="nurse_id" value="{{ Auth::user()->id }}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" id="age" class="form-control" placeholder="Age" required>
                </div>
                <div class="col-md-6">
                    <label for="birthday" class="form-label">Date</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="sexe" class="form-label">Sexe</label>
                    <select name="sexe" id="sexe" class="form-control" required>
                        <option value="Féminin">Féminin</option>
                        <option value="Masculin">Masculin</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Telephone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="occupation" class="form-label">Occupation</label>
                    <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Occupation"
                        required>
                </div>
            </div>
            <!-- Deuxième partie du formulaire -->


            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="temperature" class="form-label">Temperature</label>
                    <input type="number" name="temperature" id="temperature" class="form-control" step="0.01"
                           placeholder="Temperature" required min="35" max="50">
                </div>
                <div class="col-md-6">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="number" name="weight" id="weight" class="form-control" step="0.01"
                        placeholder="Weight" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="taille" class="form-label">Taille</label>
                    <input type="text" name="taille" id="taille" class="form-control" placeholder="Taille">
                </div>
                <div class="col-md-6">
                    <label for="tension" class="form-label">Tension</label>
                    <input type="text" name="tension" id="tension" class="form-control" placeholder="Tension">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="observation" class="form-label">Observation</label>
                    <textarea name="observation" id="observation" class="form-control" placeholder="Observation"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Ajout du champ pour sélectionner l'infirmière -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="nurse_id" class="form-label">Nurse</label>
                    <input type="text" class="form-control" value="{{ $nurse->name }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets-admin/assets/images/female-doctor-showing-her-right-hand.jpg') }}" alt="Image" class="image-side" width="100%" height="75%">
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    /* Styles pour le formulaire */
    .container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 1000px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        width: 100%;
        transition: border-color 0.3s;
    }

    /* ... Le reste de vos styles ... */

    .row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start; /* Aligner en haut */
    }

    .col-lg-6 {
        width: 48%;
    }

    .form-login {
        /* Styliser votre formulaire ici */
    }

    .image-side {
        height: 25px;
        max-width: 50%; /* Redimensionner l'image pour qu'elle soit adaptée à la colonne */
        height: auto;
    }
</style>
@endsection
