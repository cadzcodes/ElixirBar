<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductTableController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }
    public function create()
    {
        return view('admin.product-edit', [
            'product' => new Product(), // Empty model for Form::model
            'id' => null,
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product-edit', [
            'product' => $product,
            'id' => $id, // ✅ Pass the ID to the view
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stocks' => 'required|integer|min:0',
            'tags' => 'nullable|string',
        ]);

        // Auto-generate slug
        $slug = \Str::slug($validated['name']);

        $product = new Product();
        $product->fill($validated);
        $product->slug = $slug;

        // Handle tags (same as update ✅)
        $tagsArray = $request->filled('tags')
            ? array_map('trim', explode(',', $request->tags))
            : [];
        $product->tags = count($tagsArray) > 0 ? $tagsArray : null;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $imageName);
            $product->image = 'images/' . $imageName;

            $sourcePath = public_path('images/' . $imageName);
            $copyTargets = [
                env('ELIXIR_EMPORIUM_PATH'),
                storage_path('app/public/images'),
            ];

            foreach ($copyTargets as $targetPath) {
                try {
                    if (File::exists($sourcePath)) {
                        File::copy($sourcePath, $targetPath . DIRECTORY_SEPARATOR . $imageName);
                    }
                } catch (\Exception $e) {
                    \Log::error('Image copy failed to ' . $targetPath . ': ' . $e->getMessage());
                }
            }
        }

        // Handle image removal (edge case)
        if ($request->has('remove_image') && $request->remove_image == "1") {
            $product->image = null;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }





    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'description' => 'required|string',
            'stocks' => 'required|integer|min:0', // 👈 replace availability
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Update slug if name changed
        $product->slug = \Str::slug($validated['name']);

        // Handle tags
        $tagsArray = $request->filled('tags')
            ? array_map('trim', explode(',', $request->tags))
            : [];

        $product->fill($validated);
        $product->tags = count($tagsArray) > 0 ? $tagsArray : null;

        // Handle image removal
        if ($request->has('remove_image') && $request->remove_image == "1") {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
            $product->image = null;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            $imagePath = 'images/' . $imageName;
            $product->image = $imagePath;

            $sourcePath = public_path($imagePath);
            $copyTargets = [
                env('ELIXIR_EMPORIUM_PATH'),
                storage_path('app/public/images'),
            ];

            foreach ($copyTargets as $targetPath) {
                try {
                    if (File::exists($sourcePath)) {
                        File::copy($sourcePath, $targetPath . DIRECTORY_SEPARATOR . $imageName);
                    }
                } catch (\Exception $e) {
                    \Log::error('Image copy failed to ' . $targetPath . ': ' . $e->getMessage());
                }
            }
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the image file if it exists
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

}
