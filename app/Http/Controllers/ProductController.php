<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest()->paginate();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $product = new Product();

        return view('products.form', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.form', compact('product'));
    }

    public function store(StoreRequest $request)
    {
        $attributes          = $request->validated();
        $attributes['photo'] = $request->file('photo')->store('products', 'public');

        $product = Product::create($attributes);

        return redirect(route('products.index'))
            ->with('message', "Product {$product->name} created");
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $attributes = $request->validated();

        if ($request->hasFile('photo')) {
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $attributes['photo'] = $request->file('photo')->store('products', 'public');
        }

        $product->update($attributes);

        return redirect(route('products.index'))
            ->with('message', "Product $product->name updated");
    }

    public function destroy(Product $product)
    {
        $photo = $product->photo;
        $product->delete();

        if ($photo) {
            Storage::disk('public')->delete($photo);
        }

        return back()->with('message', "$product->name deleted");
    }
}
