<?php

namespace Tests\Support;

use Exception;
use Faker\Factory;
use Illuminate\Support\Collection;

trait BuilderHelpers
{
    protected function collect($models)
    {
        return $models instanceof Collection ? $models : collect([$models]);
    }

    protected function return(Collection $models, $quantity = null)
    {
        return $quantity > 1 ? $models : $models->first();
    }

    protected function faker()
    {
        return Factory::create();
    }

    public function create($quantity = null)
    {
        if (!isset($this->model)) {
            throw new Exception('A model property should be defined to use the create method builder.');
        }

        $models = $this->collect(
            factory($this->model, $quantity)->create($this->attributes)
        )->each(function ($model) {
            if (method_exists($this, 'afterCreate')) {
                $this->afterCreate($model);
            }
        });

        return $this->return($models, $quantity);
    }
}
