<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class IndexTest extends TestCase
{
    protected function listProducts()
    {
        return $this->getJson(route('products.index'));
    }

    /** @test */
    public function it_should_return_all_products_paginated()
    {
        $user     = $this->user();
        /** @var Collection $products */
        $products    = factory(Product::class, 16)->create();
        $lastProduct = $products->pop();

        $response = $this->actingAs($user)
            ->listProducts()
            ->assertOk();

        $response->assertDontSee($lastProduct->name);
        $products->each(function (Product $product) use ($response) {
            $response->assertSee($product->name);
        });
    }
}
