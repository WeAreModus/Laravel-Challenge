<?php

namespace Tests\Builders;

use App\Models\User;
use Tests\Support\BuilderHelpers;

class UserBuilder
{
    use BuilderHelpers;

    protected $model = User::class;

    protected $attributes = [];
}
