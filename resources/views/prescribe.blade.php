@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Prescribe</h1>
    <div class="row">
        <div class="col-md-8">
            <form class="form-group" name="prescribeform" method="post" action="{{ route('appointment.prescription', $patient->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="disease" class="form-label">Disease</label>
                        <textarea id="disease" class="form-control" rows="5" name="disease" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="allergy" class="form-label">Allergies</label>
                        <textarea id="allergy" class="form-control" rows="5" name="allergy" required></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="prescription" class="form-label">Prescription</label>
                        <textarea id="prescription" class="form-control" rows="5" name="prescription" required></textarea>
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Prescribe</button>
                <a href="{{ route('doctor.home') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('assets-admin/assets/images/prescribe.jpg') }}" alt="Image" class="image-side" width="100%" height="100%">
        </div>
    </div>
</div>
@endsection
