<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventSlotGroup extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'slot_group_id',
		'event_id',
		'unit',
		'public_data',
		'position'
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'slot_group_id' => null,
        'event_id' => null,
		'unit' => null,
		'public_data' => null,
		'position' => 0
    ];
}
