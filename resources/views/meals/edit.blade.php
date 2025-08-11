@extends('layouts.basic')

@section('title', 'Edit Meal')

@section('content')
    <h2>Edit Meal</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Meal Name</label>
            <input type="text" name="name" value="{{ old('name', $meal->name) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $meal->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity:</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $meal->quantity) }}" min="1">
        </div>
        <div class="mb-3">
            <label class="form-label">Calories:</label>
            <input type="number" name="calories" class="form-control" value="{{ old('calories', $meal->calories) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price (LKR):</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $meal->price) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image:</label><br>
            @if($meal->image_path)
                <img src="{{ asset('storage/' . $meal->image_path) }}" width="100" class="mb-2">
            @else
                No image
            @endif
            <input type="file" name="image_path" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="meal_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $meal->meal_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        

        <button type="submit" class="btn btn-success">Update Meal</button>
        <a href="{{ route('meals.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection