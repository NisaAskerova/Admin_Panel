<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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
            'brand_ids' => 'required|array|size:1', // Expect only one brand
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
    
        // Attach only the first brand (ensure the brand_ids array has only one value)
        $product->brands()->attach($validated['brand_ids'][0]);  // Use only the first brand id
    
        // Attach categories and tags
        $product->categories()->attach($validated['category_ids']);
        $product->tags()->attach($validated['tag_ids']);
    
        return response()->json(['message' => 'Product created successfully'], 201);
    }
    
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Validate request with "sometimes" for optional fields
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
            'brand_ids' => 'required|array|size:1', // Expect only one brand
            'brand_ids.*' => 'exists:brands,id',
            'tag_ids' => 'sometimes|array',
            'tag_ids.*' => 'exists:tags,id',
        ]);
    
        // Conditional update for each field that is passed in the request
        if ($request->has('title') && $request->title !== $product->title) {
            $product->title = $validatedData['title'];
        }
    
        if ($request->has('description') && $request->description !== $product->description) {
            $product->description = $validatedData['description'];
        }
    
        if ($request->has('price') && $request->price !== $product->price) {
            $product->price = $validatedData['price'];
        }
    
        if ($request->has('has_stock') && $request->has_stock !== $product->has_stock) {
            $product->has_stock = $validatedData['has_stock'];
        }
    
        if ($request->has('stock_quantity') && $request->stock_quantity !== $product->stock_quantity) {
            $product->stock_quantity = $validatedData['stock_quantity'];
        }
    
        // Handle image uploads only if provided
        if ($request->hasFile('image')) {
            // Delete the old image if exists before uploading the new one
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('images/products', 'public');
        }
    
        if ($request->hasFile('images')) {
            // Handle multiple images
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('images/products', 'public');
            }
            // Optionally delete old images if necessary
            if ($product->images) {
                foreach ($product->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $product->images = $images;
        }
    
        // Update the relationships (categories, brands, and tags) if provided
        if ($request->has('category_ids')) {
            $product->categories()->sync($validatedData['category_ids']);
        }
    
        // Attach only the first brand (ensure the brand_ids array has only one value)
        $product->brands()->sync([$validatedData['brand_ids'][0]]); // Sync only the first brand
    
        if ($request->has('tag_ids')) {
            $product->tags()->sync($validatedData['tag_ids']);
        }
    
        // Save the product with updated fields
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

public function filter(Request $request)
{
    // Filtrlər üçün istifadə ediləcək dəyərləri götürürük
    $categoryIds = $request->input('category_ids', []);
    $brandIds = $request->input('brand_ids', []);
    $tagIds = $request->input('tag_ids', []);
    $minPrice = $request->input('min_price', 0);
    $maxPrice = $request->input('max_price', 1000000); // Maksimum qiymət

    $query = Product::with(['categories', 'brands', 'tags']);

    // Filteri Category-ə görə tətbiq edirik
    if (!empty($categoryIds)) {
        $query->whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('id', $categoryIds);
        });
    }

    // Filteri Brand-ə görə tətbiq edirik
    if (!empty($brandIds)) {
        $query->whereHas('brands', function ($query) use ($brandIds) {
            $query->whereIn('id', $brandIds);
        });
    }

    // Filteri Tag-ə görə tətbiq edirik
    if (!empty($tagIds)) {
        $query->whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('id', $tagIds);
        });
    }

    // Filteri Price-ə görə tətbiq edirik
    if ($minPrice || $maxPrice) {
        $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

    // Filtrlənmiş məhsulları alırıq
    $products = $query->get();

    // Dinamik Category və Brand Count-ları
    $categories = Category::withCount('products')->get();
    $brands = Brand::withCount('products')->get();

    return response()->json([
        'products' => $products,
        'categories' => $categories,
        'brands' => $brands
    ], 200);
}





}



