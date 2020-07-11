<?php

namespace Tests\Feature\Http\Controllers\Api\ProductController;

use App\Models\Product;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    public function destroyProduct(Product $product): TestResponse
    {
        return $this->deleteJson(route('api.products.destroy', $product));
    }

    /** @test */
    public function it_should_be_authenticated()
    {
        $this->destroyProduct($this->product()->create())->assertUnauthorized();
    }

    /** @test */
    public function it_should_return_a_json_with_all_products_paginated()
    {
        $user    = $this->user()->create();
        $product = $this->product()->create();

        $this
            ->actingAs($user)
            ->destroyProduct($product)
            ->assertNoContent();

        $this->assertDatabaseMissing($product->getTable(), ['id' => $product->id]);
    }
}
