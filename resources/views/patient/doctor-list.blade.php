@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Choose a Doctor</h1>
    <form action="{{ route('assign.doctor') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="doctor_id" class="form-label">Select Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

        <button type="submit" class="btn btn-primary">Assign Doctor</button>
    </form>
</div>
@endsection
