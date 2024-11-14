
<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
     
        $request->validate([
            'review_comment' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5', 
        ]);

        $review = new Review();
        $review->user_id = Auth::id(); 
        $review->product_id = $productId;
        $review->review_comment = $request->review_comment;
        $review->review_date = now();
        $review->save();

        if ($request->has('rating')) {
            $rating = new Rating();
            $rating->user_id = Auth::id(); 
            $rating->product_id = $productId;
            $rating->rating = $request->rating;
            $rating->save();
        }

        return response()->json([
            'message' => 'Şərhiniz və qiymətləndirməniz uğurla əlavə olundu.'
        ]);
    }

    public function show($productId)
    {
        $product = Product::with(['reviews.user', 'ratings.user'])->findOrFail($productId);

        return response()->json($product);
    }
}
