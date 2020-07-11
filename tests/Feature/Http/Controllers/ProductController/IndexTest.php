<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class IndexTest extends TestCase
{
    protected function listProducts()
    {
        return $this->get(route('products.index'));
    }

    /** @test */
    public function it_is_allowed_for_guests()
    {
        $this->listProducts()->assertOk();
    }

    /** @test */
    public function it_should_return_all_products_paginated()
    {
        /** @var Collection $products */
        $products     = $this->product()->create(16);
        $firstProduct = $products->shift();

        $response = $this->listProducts()->assertOk();

        $response->assertDontSee($firstProduct->name);
        $products->each(function (Product $product) use ($response) {
            $response->assertSee($product->name);
        });
    }
}
