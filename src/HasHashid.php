<?php

namespace Intervention\EloquentHashid;

use Hashids\Hashids;

trait HasHashid
{
    /**
     * Call model booted event
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new HashidScope());
    }

    /**
     * Resolve models route binding
     *
     * @param  string  $value
     * @param  ?string $field
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if ($field === 'hashid') {
            return $this->hashid($value)->firstOrFail();
        }

        return parent::resolveRouteBinding($value, $field);
    }

    /**
     * Accessor to build hashid of model instance
     *
     * @return string
     */
    public function getHashidAttribute()
    {
        return $this->getHashidEngine()->encode($this->getKey());
    }

    /**
     * Scope to select model by hashid
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string|array                          $hashid
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHashid($query, string|array $hashid)
    {
        if (is_string($hashid)) {
            return $query->where('id', $this->decodeHashid($hashid));
        }

        return $query->whereIn('id', array_map(function ($encoded) {
            return $this->decodeHashid($encoded);
        }, $hashid));
    }

    /**
     * Decode given hashid to id
     *
     * @param  string $hashid
     * @return ?int
     */
    protected function decodeHashid($hashid): ?int
    {
        return data_get($this->getHashidEngine()->decode($hashid), 0);
    }

    /**
     * Get Hashid Engine
     *
     * @return \Hashids\Hashids
     */
    protected function getHashidEngine(): Hashids
    {
        return new Hashids(
            $this->getHashidSalt(),
            config('hashid.min_length', Defaults::MIN_LENGTH),
            config('hashid.alphabet', Defaults::ALPHABET)
        );
    }

    /**
     * Get hashid salt depending on model's class and application name
     *
     * @return string
     */
    protected function getHashidSalt(): string
    {
        return implode(':', [
            config('hashid.salt_prefix', Defaults::SALT_PREFIX),
            get_class($this),
        ]);
    }
}
