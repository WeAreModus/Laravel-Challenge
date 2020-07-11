<?php

namespace Tests\Builders;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Tests\Support\BuilderHelpers;

class ProductBuilder
{
    use BuilderHelpers;

    protected $model = Product::class;

    protected $attributes = [];

    public function withPhoto($filename = 'some.png', $sizeInKilobytes = null)
    {
        $this->attributes['photo'] = UploadedFile::fake()->image($filename);
        if ($sizeInKilobytes) {
            $this->attributes['photo']->size($sizeInKilobytes);
        }

        return $this;
    }

    public function make($quantity = null)
    {
        return factory($this->model, $quantity)->make($this->attributes);
    }
}
