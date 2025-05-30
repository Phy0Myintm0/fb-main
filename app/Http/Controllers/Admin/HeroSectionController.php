<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;;

class HeroSectionController extends Controller
{

public function edit()
{
    $hero = HeroSection::first();
    return view('admin.hero_section', compact('hero'));
}

public function update(Request $request)
{
    $request->validate([
        'title' => 'nullable|string|max:255',
        'content' => 'nullable|string',
    ]);

    $hero = HeroSection::first() ?? new HeroSection();

    $hero->title = $request->title;
    $hero->content = $request->content;
    $hero->save();

    return back()->with('success', 'Hero section updated successfully.');
}

}
