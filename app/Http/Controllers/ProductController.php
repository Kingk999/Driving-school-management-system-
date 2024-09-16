<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Rules\PriceValidation;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

        // The show method to display a specific product's details
        public function show($id)
        {
            // Find the product by ID or throw a 404 error if not found
            $product = Product::findOrFail($id);
    
            // Return the view with the product data
            return view('products.show', compact('product'));
        }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => ['required', new PriceValidation],
            'category_id' => 'required|exists:categories,id'
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => ['required', new PriceValidation], // Ensure price validation allows decimal
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update the product with the validated data
        $product->update($request->all());

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
