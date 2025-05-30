<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with(['category', 'keywords'])
            ->latest()
            ->paginate(10);
            
        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        
        return view('admin.contents.create', compact('categories', 'keywords'));
    }

    
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|max:10240',
        'image_1' => 'nullable|image|max:10240',
        'image_2' => 'nullable|image|max:10240',
        'image_3' => 'nullable|image|max:10240',
        'category_id' => 'required|exists:categories,id',
        'keywords' => 'array',
        'keywords.*' => 'exists:keywords,id',
        'publish_date' => 'required|date'
    ]);

    $validated['slug'] = Content::generateSlug($validated['title']);
    $validated['image'] = $request->file('image')->store('content-images', 'public');

    // Store additional images if present
    foreach (['image_1', 'image_2', 'image_3'] as $field) {
        if ($request->hasFile($field)) {
            $validated[$field] = $request->file($field)->store('content-images', 'public');
        }
    }

    $content = Content::create($validated);

    if ($request->has('keywords')) {
        $content->keywords()->sync($request->keywords);
    }

    return redirect()->route('admin.contents.index')
        ->with('success', 'Content created successfully');
}

    public function edit(Content $content)
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        
        return view('admin.contents.edit', compact('content', 'categories', 'keywords'));
    }

    public function update(Request $request, Content $content)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:10240',
        'image_1' => 'nullable|image|max:10240',
        'image_2' => 'nullable|image|max:10240',
        'image_3' => 'nullable|image|max:10240',
        'category_id' => 'required|exists:categories,id',
        'keywords' => 'array',
        'keywords.*' => 'exists:keywords,id',
        'publish_date' => 'required|date'
    ]);

    if ($request->title !== $content->title) {
        $validated['slug'] = Content::generateSlug($validated['title']);
    }

    // Replace main image if uploaded
    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($content->image);
        $validated['image'] = $request->file('image')->store('content-images', 'public');
    }

    // Replace additional images if uploaded
    foreach (['image_1', 'image_2', 'image_3'] as $field) {
        if ($request->hasFile($field)) {
            if ($content->$field) {
                Storage::disk('public')->delete($content->$field);
            }
            $validated[$field] = $request->file($field)->store('content-images', 'public');
        }
    }

    $content->update($validated);
    $content->keywords()->sync($request->keywords ?? []);

    return redirect()->route('admin.contents.index')
        ->with('success', 'Content updated successfully');
}
    public function destroy(Content $content)
    {
        Storage::disk('public')->delete($content->image);
        $content->keywords()->detach();
        $content->delete();

        return redirect()->route('admin.contents.index')
            ->with('success', 'Content deleted successfully');
    }
}