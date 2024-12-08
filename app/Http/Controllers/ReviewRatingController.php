<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewRatingController extends Controller
{
    public function index($productId)
    {
        $reviews = Review::with('user', 'ratings')  
            ->where('product_id', $productId)
            ->get();
    
        $productRating = $reviews->avg(function ($review) {
            return $review->ratings->avg('rating');
        });
    
        $response = [
            'reviews' => $reviews,
            'product_rating' => $productRating,
        ];
    
        return response()->json($response);
    }

    public function store(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'review_comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $review = Review::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'review_comment' => $request->review_comment,
            'review_date' => now(),
        ]);

        $rating = Rating::updateOrCreate(
            [
                'product_id' => $productId,
                'user_id' => auth()->id(),
                'review_id' => $review->id, 
            ],
            ['rating' => $request->rating] // Reytinq dəyərini daxil et
        );
    
        return response()->json([
            'message' => 'Review submitted successfully.',
            'review' => $review,
            'rating' => $rating,
        ]);
    }
}
