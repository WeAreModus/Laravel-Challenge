<?php

namespace Tests\Feature\Http\Controllers\Api\ProductController;

use App\Models\Product;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function showProduct(Product $product): TestResponse
    {
        return $this->getJson(route('api.products.show', $product));
    }

    /** @test */
    public function it_can_be_guest()
    {
        $this->showProduct($this->product()->create())
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'price',
                'address',
                'state',
                'city',
                'zip',
                'country',
                'photo_url',
                'photo',
            ]);
    }
}
