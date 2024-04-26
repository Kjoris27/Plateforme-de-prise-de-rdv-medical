@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    You are the doctor.
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top: 3%; display: flex; align-items: flex-start;">
        <div class="list-group" id="list-tab" role="tablist" style="flex: 1; margin-top: 20px; height: 100px; width: 100px;">
            <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
            <a class="list-group-item list-group-item-action" href="{{ route('doctor.appointments') }}" id="list-doc-list" role="tab" aria-controls="home">Appointments</a>
            <a class="list-group-item list-group-item-action" href="{{ route('doctor.prescriptions') }}" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions List</a>
        </div>

        <div style="flex: 1;">
            <img src="{{ asset('assets-admin/assets/images/doctor.jpg') }}" alt="Image" class="image-side" width="350" height="350">
        </div>
    </div>






@endsection
