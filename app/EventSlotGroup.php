<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventSlotGroup extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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

	/**
	 * Get the event related to this event slot group
	 *
	 * @return void
	 */
	public function event()
	{
		return $this->belongsTo('App\Event');
	}

	/**
	 * Get the slot group for this event slot group
	 *
	 * @return void
	 */
	public function slot_group()
	{
		return $this->belongsTo('App\SlotGroup');
	}

	/**
	 * Get the event slots for this group
	 *
	 * @return void
	 */
	public function slots()
	{
		return $this->hasMany('App\EventSlot');
	}
}
