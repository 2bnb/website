<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icon_id',
        'discord_role_id',
        'description',
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
        'name' => null,
        'icon_id' => null,
        'discord_role_id' => null,
        'description' => ''
    ];
}
