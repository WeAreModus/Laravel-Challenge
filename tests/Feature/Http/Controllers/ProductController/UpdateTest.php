<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Testing\TestResponse;

class UpdateTest extends TestCase
{
    protected function updateProduct(Product $product): TestResponse
    {
        return $this->put(route('products.update', $product), $product->toArray());
    }

    /** @test */
    public function it_should_be_authenticated()
    {
        $this->updateProduct($this->product()->create())
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function it_should_update_a_product_and_flash_a_message()
    {
        /** @var Product $product */
        $product   = $this->product()->withPhoto()->create();
        $user      = $this->user()->create();
        $newValues = $this->product()->withPhoto()->make()->toArray();

        $product->forceFill($newValues);

        $this->actingAs($user)
            ->updateProduct($product)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('message', "Product $product->name updated");

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
    public function all_fields_are_required_except_photo()
    {
        $existing    = $this->product()->create();
        $user        = $this->user()->create();
        $product     = new Product();
        $product->id = $existing->id;

        $this->actingAs($user)
            ->updateProduct($product)
            ->assertSessionHasErrors([
                'name'        => trans('validation.required', ['attribute' => 'name']),
                'description' => trans('validation.required', ['attribute' => 'description']),
                'price'       => trans('validation.required', ['attribute' => 'price']),
                'address'     => trans('validation.required', ['attribute' => 'address']),
                'state'       => trans('validation.required', ['attribute' => 'state']),
                'city'        => trans('validation.required', ['attribute' => 'city']),
                'zip'         => trans('validation.required', ['attribute' => 'zip']),
                'country'     => trans('validation.required', ['attribute' => 'country']),
            ]);
    }

    /** @test */
    public function price_field_should_be_integer()
    {
        $product = $this->product()->withPhoto()->create();
        $user    = $this->user()->create();

        $product->price = 3.25;

        $this->actingAs($user)
            ->updateProduct($product)
            ->assertSessionHasErrors([
                'price' => trans('validation.integer', ['attribute' => 'price']),
            ]);
    }

    /** @test */
    public function photo_has_max_of_2_mb_file_size()
    {
        $product = $this->product()->withPhoto('large.png', 2049)->create();
        $user    = $this->user()->create();

        $this->actingAs($user)
            ->updateProduct($product)
            ->assertSessionHasErrors([
                'photo' => 'The photo may not be greater than 2 MB.',
            ]);
    }

    /** @test */
    public function country_must_be_on_countries_list()
    {
        $product = $this->product()->create();
        $user    = $this->user()->create();

        $product->country = 'unknown country';

        $this->actingAs($user)
            ->updateProduct($product)
            ->assertSessionHasErrors([
                'country' => trans('validation.in', [
                    'attribute' => 'country', 'values' => countries()->map->name->join(','),
                ]),
            ]);
    }
}
