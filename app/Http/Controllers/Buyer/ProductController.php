<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if(Auth::user()->isSeller()) {
            $products = Product::where('seller_id', '<>', Auth::id())->latest()->paginate(10);
        } else {
            $products = Product::latest()->paginate(10);
        }
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
