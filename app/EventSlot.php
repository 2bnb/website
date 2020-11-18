<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventSlot extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'user_uuid',
		'username',
		'slot_id',
		'event_slot_group_id',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'user_uuid' => null,
        'username' => null,
		'slot_id' => null,
		'event_slot_group_id' => null,
    ];
}
