<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|uuid', // Ensure the product ID is valid
            'review' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5', // Validate rating
        ]);

        $reviewText = $request->input('review');

        // Call Python script to analyze sentiment
        $pythonScript = base_path('python_scripts/analyze_sentiment.py');
        $command = escapeshellcmd("python $pythonScript \"$reviewText\"");
        $sentiment = trim(shell_exec($command));
       
        // Store the review in the database
        ProductReview::create([
            'product_id' => $request->input('product_id'),
            'rating' => $request->input('rating'),
            'sentiment_type' => $sentiment,
            'review' => $reviewText,
        ]);

        return back()->with('message', "Review submitted successfully with sentiment: $sentiment");
        
    }
}
