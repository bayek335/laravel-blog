<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!auth()->check() || auth()->user()->name !== 'Bayu Pamungkas') {
        //     abort(403);
        // }

        // $this->authorize('is_admin');
        $categories = Category::latest()->get();
        return view('dashboard.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:50|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        Category::create(request()->all());

        return redirect()->to('/dashboard/category')->with('success', 'Category was created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'category_name' => 'required|max:50|unique:categories',
            'slug' => 'required|unique:categories',
        ];

        if ($request->slug === $category->slug) {
            $rules['slug'] = 'required';
            $rules['category_name'] = 'required|max:50';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);
        return redirect()->to('/dashboard/category')->with('success', 'Category was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect()->to('/dashboard/category')->with('success', 'Category' . $category->category_name . 'has been deleted.');
    }

    public function getSLug()
    {
        if (!request()->name) {
            return response()->json([
                'slug' => ''
            ]);
        }

        $slug = SlugService::createSlug(Category::class, 'slug', request()->name);
        return response()->json([
            'slug' => $slug,
        ]);
    }
}
