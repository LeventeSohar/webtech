<form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="type">Animal Type</label>
        <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
    </div>
    <div class="form-group">
        <label for="size">Size</label>
        <input type="text" name="size" id="size" class="form-control" value="{{ old('size') }}">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}">
    </div>
    <div class="form-group">
        <label for="color">Color</label>
        <input type="text" name="color" id="color" class="form-control" value="{{ old('color') }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="garden_needed">Garden Needed?</label>
        <select name="garden_needed" id="garden_needed" class="form-control">
            <option value="1" {{ old('garden_needed') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('garden_needed') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>
    <div class="form-group">
        <label for="picture">Animal Picture (Optional)</label>
        <input type="file" name="picture" id="picture" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Add Animal</button>
</form>
