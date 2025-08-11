<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $meals = \App\Models\Meal::with('category')->get();
    return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = MealCategory::all(); // fetch all categories
    return view('meals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'name' => 'required|string|max:255',
        'meal_category_id' => 'required|exists:meal_categories,id',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'calories' => 'nullable|integer|min:0',
        'quantity' => 'nullable|integer|min:1',
        'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image_path')) {
        $filename = time() . '_' . $request->file('image_path')->getClientOriginalName();
        $path = $request->file('image_path')->storeAs('meals', $filename, 'public');
        $validated['image_path'] = $path;
    }

    \App\Models\Meal::create($validated);

    return redirect()->route('meals.index')->with('success', 'Meal added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
{
    $categories = MealCategory::all();
    return view('meals.edit', compact('meal', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantity' => 'nullable|integer|min:1',
        'calories' => 'nullable|integer|min:0',               
        'price' => 'required|numeric|min:0',
        'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'meal_category_id' => 'required|exists:meal_categories,id',
    ]);

    if ($request->hasFile('image_path')) {
        $filename = time() . '_' . $request->file('image_path')->getClientOriginalName();
        $path = $request->file('image_path')->storeAs('meals', $filename, 'public');
        $validated['image_path'] = $path;
    }

    $meal->update($validated);

    return redirect()->route('meals.index')->with('success', 'Meal updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
{
    $meal->delete();
    return redirect()->route('meals.index')->with('success', 'Meal deleted successfully!');
}
}
