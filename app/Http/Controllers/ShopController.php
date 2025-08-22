<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->paginate(6);
        
        return view('shop.index', compact('categories', 'products'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $products = $category->products()->paginate(6);
        
        return view('shop.category', compact('categories', 'category', 'products'));
    }

    public function product(Product $product)
    {
        $categories = Category::all();
        
        return view('shop.product', compact('categories', 'product'));
    }
}
