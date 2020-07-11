<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Builders\ProductBuilder;
use Tests\Builders\UserBuilder;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public function user()
    {
        return (new UserBuilder());
    }

    public function product()
    {
        return (new ProductBuilder());
    }
}
