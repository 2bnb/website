<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'qualification_time'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'award_id',
		'trainer_uuid',
		'supervisor_uuid',
		'max_attendees',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'award_id' => null,
		'trainer_uuid' => null,
		'supervisor_uuid' => null,
		'max_attendees' => 2,
	];

	/**
	 * Get the award to be trained
	 *
	 * @return App\Award
	 */
	public function award()
	{
		return $this->belongsTo('App\Award');
	}

	/**
	 * Get the trainer for this qualification
	 *
	 * @return App\User
	 */
	public function trainer()
	{
		return $this->belongsTo('App\User', 'trainer_uuid', 'uuid');
	}

	/**
	 * Get the supervisor for this qualification
	 *
	 * @return App\User
	 */
	public function supervisor()
	{
		return $this->belongsTo('App\User', 'supervisor_uuid', 'uuid');
	}

	/**
	 * Get the users that are attending this qualification
	 *
	 * @return App\User
	 */
	public function attendees()
	{
		return $this->belongsToMany('App\User', 'qualification_attendees', 'qualification_id', 'attendee_uuid', 'id', 'uuid');
	}
}
