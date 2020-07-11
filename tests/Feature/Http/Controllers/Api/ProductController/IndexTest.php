<?php

namespace Tests\Feature\Http\Controllers\Api\ProductController;

use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function listProducts(): TestResponse
    {
        return $this->getJson(route('api.products.index'));
    }

    /** @test */
    public function it_should_return_a_json_with_all_products_paginated()
    {
        $this->product()->create(20);

        $this->listProducts()
            ->assertOk()
            ->assertJsonCount(15, 'data')
            ->assertJsonStructure([
                'data', 'meta', 'links',
            ]);
    }
}
