@extends('layouts.basic') {{-- ✅ Use the new custom layout --}}

@section('title', 'Add Meal')

@section('content')
<div class="container">
    <h2>Add New Meal</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('meals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Meal Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
    <label for="description" class="form-label">Description:</label>
    <textarea name="description" class="form-control" rows="3"></textarea>
</div>
<div class="mb-3">
    <label for="quantity" class="form-label">Quantity:</label>
    <input type="number" name="quantity" class="form-control" min="1" value="1">
</div>
<div class="mb-3">
    <label for="calories" class="form-label">Calories:</label>
    <input type="number" name="calories" class="form-control" min="0">
</div>

        <div class="mb-3">
    <label for="price" class="form-label">Price:</label>
    <input type="number" step="0.01" name="price" class="form-control" required>
</div>
<div class="mb-3">
    <label for="image_path" class="form-label">Upload Image:</label>
    <input type="file" name="image_path" class="form-control">
</div>

        <div class="mb-3">
            <label for="meal_category_id" class="form-label">Category:</label>
            <select name="meal_category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Meal</button>
    </form>
</div>
@endsection