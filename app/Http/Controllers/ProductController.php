<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
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
            'brand_ids' => 'required|array',
            'tag_ids' => 'required|array',
        ]);

        $product = new Product();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->has_stock = $validated['has_stock'];
        $product->stock_quantity = $validated['stock_quantity'];
        
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images/products', 'public');
        }

        $product->save();

        // Attach categories, brands, and tags
        $product->categories()->attach($validated['category_ids']);
        $product->brands()->attach($validated['brand_ids']);
        $product->tags()->attach($validated['tag_ids']);

        return response()->json(['message' => 'Product created successfully'], 201);
    }
    public function show()
    {
        $products = Product::with(['categories', 'brands', 'tags', 'reviews', 'ratings'])->get();
        return response()->json($products, 200);
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
    
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('images/products', 'public');
        }
    
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('images/products', 'public');
            }
            if ($product->images) {
                foreach ($product->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $product->images = $images;
        }
        if ($request->has('category_ids')) {
            $product->categories()->sync($validatedData['category_ids']);
        }
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
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    foreach ($product->images as $image) {
        Storage::disk('public')->delete($image);
    }
    $product->delete();
    return response()->json(['message' => 'Product deleted'], 200);
}



public function show_product($id)
{
    $product = Product::with(['categories', 'brands', 'tags', 'reviews', 'ratings'])->find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }
    return response()->json($product, 200);
}



public function filter(Request $request)
{
    $categoryIds = $request->input('category_ids', []);
    $brandIds = $request->input('brand_ids', []);
    $tagIds = $request->input('tag_ids', []);
    $minPrice = (float) $request->input('min_price', 0);
    $maxPrice = (float) $request->input('max_price', 1000000); // Maksimum qiymət

    // Məhsul sorğusunu hazırlayırıq
    $query = Product::with(['categories', 'brands', 'tags'])
        ->withAvg('ratings', 'rating'); // Reytinqin orta qiymətini əlavə et

    if (!empty($categoryIds)) {
        $query->whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('id', $categoryIds);
        });
    }

    if (!empty($brandIds)) {
        $query->whereHas('brands', function ($query) use ($brandIds) {
            $query->whereIn('id', $brandIds);
        });
    }

    if (!empty($tagIds)) {
        $query->whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('id', $tagIds);
        });
    }

    if ($minPrice || $maxPrice) {
        // Ensure that minPrice is less than or equal to maxPrice
        if ($minPrice <= $maxPrice) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }
    }

    // Məhsulları gətiririk
    $products = $query->get();

    // Kategoriyalar və brendləri say ilə gətiririk
    $categories = Category::withCount('products')->get();
    $brands = Brand::withCount('products')->get();

    // JSON olaraq cavab qaytarırıq
    return response()->json([
        'products' => $products,
        'categories' => $categories,
        'brands' => $brands
    ], 200);
}


}






