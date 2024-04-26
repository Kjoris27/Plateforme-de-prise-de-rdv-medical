@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    You are the admin.
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: -100px">
        <div class="col-md-8">
            <div class="d-flex align-items-center justify-content-center" style="height: 80vh; margin-left: 20px">
                <div class="list-group" id="list-tab" role="tablist" style="width: 60%; margin-right: 20px; ">
                    <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.viewDoctors') }}" role="tab" aria-controls="home">View Doctors</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.viewNurses') }}" role="tab" aria-controls="home">View Nurses</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.viewPatients') }}" role="tab" aria-controls="home">View Patients</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.showAddDoctorForm') }}" role="tab" aria-controls="home">Add Doctor</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.showAddNurseForm') }}" role="tab" aria-controls="home">Add Nurse</a>
                </div>
                <div class="image-links">
                    <div class="row">
                        <div class="col-md-6" style="width: 100px; margin-right: 10px">
                            <div class="image-link">
                                <a href="{{ route('admin.viewDoctors') }}">
                                    <img src="{{ asset('assets-admin/assets/images/doctors_list.png') }}" alt="Doctor List">
                                    <p>Doctor List</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6" style="width: 100px; margin-left: 80px">
                            <div class="image-link">
                                <a href="{{ route('admin.viewPatients') }}">
                                    <img src="{{ asset('assets-admin/assets/images/patients_list.png') }}" alt="Patient List">
                                    <p>Patient List</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="width: 100px; margin-right: 30px">
                            <div class="image-link">
                                <a href="{{ route('admin.showAddDoctorForm') }}">
                                    <img src="{{ asset('assets-admin/assets/images/add_doctor.jpg') }}" alt="Add doctor">
                                    <p>Add doctor</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6"style="width: 100px; margin-left: 60px" >
                            <div class="image-link">
                                <a href="{{ route('admin.showAddNurseForm') }}">
                                    <img src="{{ asset('assets-admin/assets/images/nurse.jpg') }}" alt="Add nurse">
                                    <p>Add nurse</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .image-links {
        text-align: flex;
    }

    .image-link img {
        max-width: 100px;
        height: auto;
    }

    /* Ajuster la hauteur des listes de liens pour les aligner en haut */
    .list-group {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
</style>
@endsection
