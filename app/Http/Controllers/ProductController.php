<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function catalog(Request $request)
    {
        $query = Product::query();
        
        
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        
        $query->orderBy('category')->orderBy('name');
        
        
        $products = $query->paginate(12);
        
        return view('static.catalog', compact('products'));
    }
    
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('dinamic.product-card', compact('product'));
    }
}