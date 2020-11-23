<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model implements Auditable
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
		'name',
		'description',
		'reminder_time',
		'start_time',
		'end_time',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'name' => null,
        'description' => null,
	];

	/**
	 * Get the slot groups for this event
	 *
	 * @return void
	 */
	public function slot_groups()
	{
		return $this->hasMany('App\EventSlotGroup');
	}

	/**
	 * Get all users that can edit this event
	 *
	 * @return void
	 */
	public function users_that_can_edit()
	{
		return $this->belongsToMany('App\User', 'user_edit_event_permissions', 'post_id', 'user_uuid');
	}
}
