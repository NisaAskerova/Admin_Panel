<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::with(['categories', 'brands', 'tags'])->get();
        return response()->json($products, 200);
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'has_stock' => 'required|boolean',
            'stock_quantity' => 'required_if:has_stock,true|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Single image validation
            'images' => 'nullable|array', // Multiple images array
            'images.*' => 'image|mimes:jpeg,png,jpg,gif', // Validate each image in the array
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'brand_ids' => 'required|array',
            'brand_ids.*' => 'exists:brands,id',
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'exists:tags,id',
        ]);
    
        $product = new Product();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->has_stock = $validated['has_stock'];
        $product->stock_quantity = $validated['stock_quantity'];
    
        // Handle single image
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images/products', 'public');
        }
    
        // Handle multiple images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('images/products', 'public');
            }
            $product->images = $images; // Store the array of image paths
        }
    
        $product->save();
    
        // Attach categories, brands, and tags
        $product->categories()->attach($validated['category_ids']);
        $product->brands()->attach($validated['brand_ids']);
        $product->tags()->attach($validated['tag_ids']);
    
        return response()->json(['message' => 'Product created successfully'], 201);
    }
    

    
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Validate request
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'has_stock' => 'sometimes|boolean',
            'stock_quantity' => 'sometimes|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
            'category_ids' => 'sometimes|array',
            'category_ids.*' => 'exists:categories,id',
            'brand_ids' => 'sometimes|array',
            'brand_ids.*' => 'exists:brands,id',
            'tag_ids' => 'sometimes|array',
            'tag_ids.*' => 'exists:tags,id',
        ]);
    
        // Update fields conditionally
        if ($request->has('title')) {
            $product->title = $validatedData['title'];
        }
        if ($request->has('description')) {
            $product->description = $validatedData['description'];
        }
        if ($request->has('price')) {
            $product->price = $validatedData['price'];
        }
        if ($request->has('has_stock')) {
            $product->has_stock = $validatedData['has_stock'];
        }
        if ($request->has('stock_quantity')) {
            $product->stock_quantity = $validatedData['stock_quantity'];
        }
    
        // Handle image uploads
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images/products', 'public');
        }
    
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('images/products', 'public');
            }
            $product->images = $images;
        }
    
        // Update categories, brands, and tags
        if ($request->has('category_ids')) {
            $product->categories()->sync($validatedData['category_ids']);
        }
        if ($request->has('brand_ids')) {
            $product->brands()->sync($validatedData['brand_ids']);
        }
        if ($request->has('tag_ids')) {
            $product->tags()->sync($validatedData['tag_ids']);
        }
    
        $product->save();
    
        return response()->json(['message' => 'Product updated successfully'], 200);
    }
    

public function delete($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }
    
    // Delete the single image if exists
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    // Delete all multiple images if they exist
    foreach ($product->images as $image) {
        Storage::disk('public')->delete($image);
    }

    $product->delete();
    return response()->json(['message' => 'Product deleted'], 200);
}
 
public function show_product($id)
{
    $product = Product::with(['categories', 'brands', 'tags'])->find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json($product, 200);
}

}
