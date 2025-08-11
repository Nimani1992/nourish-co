@extends('layouts.basic')

@section('title', 'All Meals')

@section('content')

    <h2>All Meals</h2>

   <!-- Success message after adding a meal -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Meal Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Calories</th>
            <th>Price (LKR)</th>
            <th>Image</th>
            <th>Category</th>            
            <th>Actions</th> {{-- New column --}}
        </tr>
    </thead>
    <tbody>
        @forelse($meals as $meal)
            <tr>
                <td>{{ $meal->name }}</td>
                <td>{{ $meal->description ?? '-' }}</td>
                <td>{{ $meal->quantity }}</td>
                <td>{{ $meal->calories ?? '-' }}</td>
                
                <td>{{ $meal->price }}</td>
                <td>
    @if($meal->image_path)
        <img src="{{ asset('storage/' . $meal->image_path) }}" alt="Meal Image" width="60">
    @else
        No image
    @endif
</td>
            <td>{{ $meal->category->name ?? 'Unknown' }}</td>
                <td>
                    <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('meals.destroy', $meal->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this meal?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No meals added yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection