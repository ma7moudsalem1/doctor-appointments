@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Dear {{ $appointment->name }}, Your appointment has been approved and your date: {{ $appointment->register_at }}</h1>
        </div>
    </div>
</div>
@endsection
