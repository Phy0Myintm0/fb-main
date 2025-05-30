<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Content;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'content_id' => 'required|exists:contents,id'
        ]);

        try {
            $subscriber = Subscriber::firstOrCreate(
                ['email' => $request->email],
                ['email' => $request->email]
            );

            $subscriber->savedContents()->syncWithoutDetaching([$request->content_id]);

            return response()->json([
                'success' => true,
                'message' => 'Content saved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving content'
            ], 500);
        }
    }

    public function unsave(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'content_id' => 'required|exists:contents,id'
        ]);

        try {
            $subscriber = Subscriber::where('email', $request->email)->first();

            if ($subscriber) {
                $subscriber->savedContents()->detach($request->content_id);
            }

            return response()->json([
                'success' => true,
                'message' => 'Content removed successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error removing content'
            ], 500);
        }
    }

    public function getSavedContent(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            $subscriber = Subscriber::where('email', $request->email)->first();

            if (!$subscriber) {
                return response()->json([
                    'savedContents' => []
                ]);
            }

            return response()->json([
                'savedContents' => $subscriber->savedContents->pluck('id')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'savedContents' => []
            ]);
        }
    }
}