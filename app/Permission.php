<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Permission
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'model',
        'description',
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
        'type' => null,
        'model' => null,
        'description' => ''
    ];
}
