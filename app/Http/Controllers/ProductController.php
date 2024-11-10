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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }
    
        $product->save();
    
        // Attach categories, brands, and tags
        $product->categories()->attach($validated['category_ids']);
        $product->brands()->attach($validated['brand_ids']);
        $product->tags()->attach($validated['tag_ids']);
    
        return response()->json(['message' => 'Product created successfully'],201);
    }
    

    
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'sometimes|numeric|min:0',
            'has_stock' => 'sometimes|boolean',
            'stock_quantity' => 'required_if:has_stock,true|integer|min:0|nullable',
            'brand_ids' => 'array|exists:brands,id',
            'tag_ids' => 'array|exists:tags,id',
            'category_ids' => 'array|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validatedData);

        $product->brands()->sync($validatedData['brand_ids'] ?? []);
        $product->tags()->sync($validatedData['tag_ids'] ?? []);
        $product->categories()->sync($validatedData['category_ids'] ?? []);

        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
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
