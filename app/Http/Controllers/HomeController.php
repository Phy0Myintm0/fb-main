<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\HeroParagraph; 
use App\Models\HeroSection;

class HomeController extends Controller
{
    public function index()
    {
        $contents = Content::with(['category', 'keywords'])
            ->latest('publish_date')
            ->get(); // Using get() for client-side filtering

        $categories = Category::withCount('contents')->get();

        $hero = HeroSection::first(); // ✅ You forgot this line
        $heroParagraph = HeroParagraph::first(); // ✅ Get the first paragraph content

        return view('home', [
            'contents' => $contents,
            'categories' => $categories,
            'hero' => $hero,
            'heroParagraph' => $heroParagraph
        ]);
    }
}
