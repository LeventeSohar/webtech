@extends('layouts.app')

@section('content')
    <h1>Animals</h1>
    <a href="{{ route('animals.create') }}" class="btn btn-primary">Add Animal</a>
    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Size</th>
                <th>Age</th>
                <th>Color</th>
                <th>Description</th>
                <th>Garden Needed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->type }}</td>
                    <td>{{ $animal->size }}</td>
                    <td>{{ $animal->age }}</td>
                    <td>{{ $animal->color }}</td>
                    <td>{{ $animal->description }}</td>
                    <td>{{ $animal->garden_needed ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('animals.destroy', $animal) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection