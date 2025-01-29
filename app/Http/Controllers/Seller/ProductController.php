<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Traits\ProductService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use ProductService;
    public function index()
    {
        $products = Auth::user()->products()->latest()->paginate(10);
        return view('products.seller.index', compact('products'));
    }

    public function create()
    {
        return view('products.seller.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($data['image']);
        }

        Product::create($data);

        return redirect()->route('seller.products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('products.seller.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.seller.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        if($product->seller()->isNot(Auth::user())) {
            abort(403);
        }

        $old_image = $product->image;
        $data = $request->validated();

        if($request->hasFile('image')) {
            $this->deleteImage($old_image);

            $data['image'] = $this->uploadImage($data['image']);
        } else {
            $data['image'] = $old_image;
        }

        $product->update($data);

        return redirect()->route('seller.products.show', $product)->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->seller()->isNot(Auth::user())) {
            abort(403);
        }

        $this->deleteImage($product->image);

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Product deleted successfully');
    }
}
