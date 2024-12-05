<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewRatingController extends Controller
{
    // Rəy əlavə etmək üçün metod
    public function index($productId)
    {
        $reviews = Review::with('user', 'rating')
            ->where('product_id', $productId)
            ->get();
    
        // Add rating_value for each review, handle the case when there is no rating
        foreach ($reviews as $review) {
            $review->rating_value = $review->rating ? $review->rating->rating : null; // Safe check for null
        }
    
        return response()->json($reviews);
    }
    
  
    public function store(Request $request, $productId)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'review_comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Create or update the rating
        $rating = Rating::updateOrCreate(
            [
                'product_id' => $productId,
                'user_id' => auth()->id(),
            ],
            ['rating' => $request->rating]
        );
    
        // Create the review
        $review = Review::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'review_comment' => $request->review_comment,
            'review_date' => now(),
        ]);
    
        return response()->json([
            'message' => 'Review submitted successfully.',
            'review' => $review,
            'rating' => $rating,
        ]);
    }
}
