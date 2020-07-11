<?php

namespace Tests\Feature\Http\Controllers\Api\ProductController;

use App\Models\Product;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class StoreTest extends TestCase
{
    protected function storeProduct(Product $product): TestResponse
    {
        return $this->postJson(route('api.products.store'), $product->toArray());
    }

    /** @test */
    public function it_should_be_authenticated()
    {
        $this->storeProduct($this->product()->make())
            ->assertUnauthorized();
    }

    /** @test */
    public function it_should_create_a_new_product()
    {
        /** @var Product $product */
        $product = $this->product()->withPhoto()->make();
        $user    = $this->user()->create();

        $this->actingAs($user)
            ->storeProduct($product)
            ->assertCreated()
            ->assertJsonFragment(Product::first()->toArray());

        $this->assertDatabaseHas($product->getTable(), [
            'name'        => $product->name,
            'description' => $product->description,
            'price'       => $product->price,
            'address'     => $product->address,
            'state'       => $product->state,
            'city'        => $product->city,
            'zip'         => $product->zip,
            'country'     => $product->country,
        ]);
        $this->assertNotNull(Product::first()->photo);
    }

    /** @test */
    public function all_fields_are_required()
    {
        $product = new Product();
        $user    = $this->user()->create();

        $this->actingAs($user)
            ->storeProduct($product)
            ->assertJsonValidationErrors([
                'name'        => trans('validation.required', ['attribute' => 'name']),
                'description' => trans('validation.required', ['attribute' => 'description']),
                'price'       => trans('validation.required', ['attribute' => 'price']),
                'address'     => trans('validation.required', ['attribute' => 'address']),
                'state'       => trans('validation.required', ['attribute' => 'state']),
                'city'        => trans('validation.required', ['attribute' => 'city']),
                'zip'         => trans('validation.required', ['attribute' => 'zip']),
                'country'     => trans('validation.required', ['attribute' => 'country']),
                'photo'       => trans('validation.required', ['attribute' => 'photo']),
            ]);
    }

    /** @test */
    public function price_field_should_be_integer()
    {
        $product = $this->product()->withPhoto()->make();
        $user    = $this->user()->create();

        $product->price = 3.25;

        $this->actingAs($user)
            ->storeProduct($product)
            ->assertJsonValidationErrors([
                'price' => trans('validation.integer', ['attribute' => 'price']),
            ]);
    }

    /** @test */
    public function photo_has_max_of_2_mb_file_size()
    {
        $product = $this->product()->withPhoto('large.png', 2049)->make();
        $user    = $this->user()->create();

        $this->actingAs($user)
            ->storeProduct($product)
            ->assertJsonValidationErrors([
                'photo' => 'The photo may not be greater than 2 MB.',
            ]);
    }

    /** @test */
    public function country_must_be_on_countries_list()
    {
        $product = $this->product()->make();
        $user    = $this->user()->create();

        $product->country = 'unknown country';

        $this->actingAs($user)
            ->storeProduct($product)
            ->assertJsonValidationErrors([
                'country' => trans('validation.in', [
                    'attribute' => 'country', 'values' => countries()->map->name->join(','),
                ]),
            ]);
    }
}
