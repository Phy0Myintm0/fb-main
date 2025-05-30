<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroParagraph;

class HeroParagraphController extends Controller
{
    public function edit()
    {
        $paragraph = HeroParagraph::first();
        return view('admin.hero_paragraph.edit', compact('paragraph'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'paragraph' => 'required|string|max:1000',
        ]);

        $paragraph = HeroParagraph::first();

        if (!$paragraph) {
            $paragraph = new HeroParagraph();
        }

        $paragraph->paragraph = $request->paragraph;
        $paragraph->save();

        return redirect()->back()->with('success', 'Paragraph updated successfully.');
    }
}

