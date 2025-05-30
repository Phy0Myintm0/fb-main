<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::latest()->paginate(10);
        return view('admin.keywords.index', compact('keywords'));
    }

    public function create()
    {
        return view('admin.keywords.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:keywords',
            'color' => 'required|in:primary,secondary,success,danger,warning,info,dark'
        ]);

        Keyword::create($validated);

        return redirect()->route('admin.keywords.index')
            ->with('success', 'Keyword created successfully');
    }

    public function edit(Keyword $keyword)
    {
        return view('admin.keywords.edit', compact('keyword'));
    }

    public function update(Request $request, Keyword $keyword)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:keywords,name,'.$keyword->id,
            'color' => 'required|in:primary,secondary,success,danger,warning,info,dark'
        ]);

        $keyword->update($validated);

        return redirect()->route('admin.keywords.index')
            ->with('success', 'Keyword updated successfully');
    }

    public function destroy(Keyword $keyword)
    {
        $keyword->delete();

        return redirect()->route('admin.keywords.index')
            ->with('success', 'Keyword deleted successfully');
    }
}