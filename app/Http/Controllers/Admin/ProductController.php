<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->orderBy('id', 'desc')->get();

        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.product-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['name', 'category', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Товар добавлен');
    }

    public function edit($id)
    {
        return view('admin.product-form', [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['name', 'category', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            $this->deleteImage($product->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Товар обновлен');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        $this->deleteImage($product->image);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Товар удален');
    }

    private function uploadImage($image)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        return $imageName;
    }

    private function deleteImage($imageName)
    {
        if ($imageName && file_exists(public_path('images/' . $imageName))) {
            unlink(public_path('images/' . $imageName));
        }
    }
}