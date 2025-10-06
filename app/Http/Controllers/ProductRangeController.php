<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRange;
use Illuminate\Support\Str;

class ProductRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productRanges = ProductRange::orderBy('sort_order', 'asc')->paginate(10);
        return view('backend.product-range.index', compact('productRanges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product-range.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $slug = generateUniqueSlug($request->title, ProductRange::class);
        $validatedData['slug'] = $slug;
        $validatedData['sort_order'] = $request->input('sort_order', 0);

        $productRange = ProductRange::create($validatedData);

        $message = $productRange
            ? 'Product Range Successfully added'
            : 'Please try again!!';

        return redirect()->route('product-range.index')->with(
            $productRange ? 'success' : 'error',
            $message
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productRange = ProductRange::findOrFail($id);
        return view('backend.product-range.edit', compact('productRange'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productRange = ProductRange::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validatedData['sort_order'] = $request->input('sort_order', 0);

        $status = $productRange->update($validatedData);

        $message = $status
            ? 'Product Range Successfully updated'
            : 'Please try again!!';

        return redirect()->route('product-range.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productRange = ProductRange::findOrFail($id);
        $status = $productRange->delete();

        $message = $status
            ? 'Product Range successfully deleted'
            : 'Error while deleting product range';

        return redirect()->route('product-range.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }
}
