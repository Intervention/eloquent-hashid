<?php

namespace Intervention\EloquentHashid;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class HashidScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        # scope is just included to extend...
    }

    /**
     * Extend Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        $builder->macro('findByHashid', function (Builder $builder, $hashid) {
            return $builder->hashid($hashid)->first();
        });

        $builder->macro('findByHashidOrFail', function (Builder $builder, $hashid) {
            return $builder->hashid($hashid)->firstOrFail();
        });
    }
}
