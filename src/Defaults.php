<?php

namespace Intervention\EloquentHashid;

interface Defaults
{
    public const SALT_PREFIX = 'intervention-eloquent-hashid';
    public const MIN_LENGTH = 6;
    public const ALPHABET = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
}
