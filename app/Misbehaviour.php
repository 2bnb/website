<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Misbehaviour extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'type',
		'method',
		'user_uuid',
		'issuer_uuid',
		'description',
		'event_id',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'type' => null,
		'method' => null,
		'user_uuid' => null,
        'issuer_uuid' => null,
		'description' => null,
		'event_id' => null,
    ];
}
