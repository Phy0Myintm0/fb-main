<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function index(Request $request)
    {
        // Get email from URL parameter
        $email = $request->query('email');
        
        if (!$email) {
            return redirect('/')->with('error', 'Please save content first to access your page');
        }

        // Verify subscriber exists
        $subscriber = Subscriber::where('email', $email)->first();
        
        if (!$subscriber) {
            return redirect('/')->with('error', 'Subscriber not found');
        }

        // Load saved content
        $contents = $subscriber->savedContents()
                        ->orderBy('publish_date', 'desc')
                        ->get();

        return view('mypage', [
            'contents' => $contents,
            'email' => $email
        ]);
    }
}