<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function index()
    {
        return JsonResource::collection(
            Product::latest('id')->paginate()
        );
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(StoreRequest $request)
    {
        $attributes          = $request->validated();
        $attributes['photo'] = $request->file('photo')->store('products', 'public');

        return Product::create($attributes);
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

        return $product;
    }

    public function destroy(Product $product)
    {
        $photo = $product->photo;
        $product->delete();

        if ($photo) {
            Storage::disk('public')->delete($photo);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
