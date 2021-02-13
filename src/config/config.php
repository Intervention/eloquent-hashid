<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Salt Prefix
    |--------------------------------------------------------------------------
    |
    | The salt of the hashid is built from the full classname including the
    | namespace of the eloquent model and this prefix. Change this option
    | in any case with your own value.
    |
    */
    'salt_prefix' => 'intervention-eloquent-hashid',

    /*
    |--------------------------------------------------------------------------
    | Minimum Hash Length
    |--------------------------------------------------------------------------
    |
    | Padding to give your hashid a certain min. length. The final id is only
    | padded to fit at least this length. It might be longer.
    |
    */
    'min_length' => 6,

    /*
    |--------------------------------------------------------------------------
    | Possible chars in a hashid
    |--------------------------------------------------------------------------
    |
    | Define the possible characters for building hashids.
    |
    */
    'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',

];
