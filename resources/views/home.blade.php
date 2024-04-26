@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @elseif (auth()->user()->is_admin == 2)
                    <a href="{{ url('cashier/routes') }}">Cashier</a>
                    @elseif (auth()->user()->is_admin == 3)
                    <a href="{{ url('nurse/routes') }}">Nurse</a>
                    @elseif (auth()->user()->is_admin == 4)
                    <a href="{{ url('doctor/routes') }}">Doctor</a>
                    @else
                    <div class=”panel-heading”>Normal User</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
