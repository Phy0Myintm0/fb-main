<?php

use App\Http\Controllers\SubscriptionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
Route::post('/unsave', [SubscriptionController::class, 'unsave']);
Route::get('/saved-content', [SubscriptionController::class, 'getSavedContent']);
Route::get('/content/{slug}', function($slug) {
    $content = \App\Models\Content::with('keywords')
                ->where('slug', $slug)
                ->firstOrFail();

    // Collect additional images into an array
    $additionalImages = array_filter([
        $content->image1,
        $content->image2,
        $content->image3,
    ]);

    // Add it to response
    return response()->json([
        'success' => true,
        'content' => [
            ...$content->toArray(),
            'additional_images' => $additionalImages,
        ]
    ]);

});