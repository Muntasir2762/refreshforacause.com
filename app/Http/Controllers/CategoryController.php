<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\AlertTrait;
use App\Models\CategoryStatus;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use AlertTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = CategoryStatus::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->paginate(15);
        return view('admin.category.category-index', compact(['statuses', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:categories,name',
            'status' => 'required'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();

        return redirect()
            ->route('manage.categories.index')
            ->with($this->successAlert('Successfully Created!'));
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
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $statuses = CategoryStatus::orderBy('name', 'asc')->get();
        return view('admin.category.category-edit', compact(['statuses', 'category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $categoryId = $request->id;
        if (!$categoryId) {
            return back();
        }

        $request->validate([
            'name' => 'required|min:3|max:100|unique:categories,name,' . $categoryId,
            'status' => 'required'
        ]);

        $category = Category::findOrFail($categoryId);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();

        return redirect()
            ->route('manage.categories.index')
            ->with($this->successAlert('Successfully Updated!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
