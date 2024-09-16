<?php

namespace App\Http\Controllers;

use App\Mail\CategoryMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        $category = new Category();
        $category->name = $request->name;
        $category->save();
    
        // Get the currently logged-in user's email
        $user = Auth::user();
        
        // Send the email to the logged-in user
        Mail::to($user->email)->send(new CategoryMail($category));
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('categories.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate(['name'=>'required']);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
