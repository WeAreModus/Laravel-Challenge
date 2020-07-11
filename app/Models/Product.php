<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property string $address
 * @property string $state
 * @property string $city
 * @property string $zip
 * @property string $country
 * @property string $photo
 * @property string $photo_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'address',
        'state',
        'city',
        'zip',
        'country',
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'photo_url',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? url($this->photo) : null;
    }
}
