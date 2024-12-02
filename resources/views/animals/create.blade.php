@extends('layouts.app')

@section('content')
    <h1>Add Animal</h1>
    <form action="{{ route('animals.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="rodent">Rodent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="size">Size (for dogs)</label>
            <input type="text" name="size" id="size" class="form-control">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control">
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="garden_needed">Garden Needed (only for dogs)</label>
            <select name="garden_needed" id="garden_needed" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Animal</button>
    </form>
@endsection
