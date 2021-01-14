<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Misbehaviour extends Model implements Auditable
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

	/**
	 * User that this misbehaviour is for
	 *
	 * @return App\User
	 */
	public function user()
	{
		return $this->belongsTo('App\User', 'user_uuid', 'uuid');
	}

	/**
	 * User that issued the misbehaviour
	 *
	 * @return App\User
	 */
	public function issuer()
	{
		return $this->belongsTo('App\User', 'issuer_uuid', 'uuid');
	}

	/**
	 * Event that relates to this misbehaviour
	 *
	 * @return App\Event
	 */
	public function event()
	{
		return $this->belongsTo('App\Event');
	}
}
