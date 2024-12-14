@extends('layouts.app')

@section('title', 'Adopt')

@section('content')
<div class="adoption-page container">
    <h1 class="text-center my-4">Animals Available for Adoption</h1>
    <div class="row justify-content-center">
        @foreach($animals as $animal)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" alt="{{ $animal->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $animal->name }} <span class="text-muted">{{ $animal->age }}</span></h5>
                    <p class="card-text">{{ Str::limit($animal->description, 100) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
