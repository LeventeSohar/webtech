@extends('layouts.app')

@section('content')
    <h1>Edit Animal</h1>
    <form action="{{ route('animals.update', $animal) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="dog" {{ $animal->type === 'dog' ? 'selected' : '' }}>Dog</option>
                <option value="cat" {{ $animal->type === 'cat' ? 'selected' : '' }}>Cat</option>
                <option value="rodent" {{ $animal->type === 'rodent' ? 'selected' : '' }}>Rodent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="size">Size (for dogs)</label>
            <input type="text" name="size" id="size" class="form-control" value="{{ $animal->size }}">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $animal->age }}">
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" value
