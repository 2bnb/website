<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Award extends Model implements Auditable
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
		'type',
		'icon_id',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'name' => null,
        'description' => '',
        'type' => null,
        'icon_id' => null,
	];


	/**
	 * Get the icon for this award
	 *
	 * @return void
	 */
	public function icon()
	{
		return $this->belongsTo('App\Resource', 'icon_id');
	}

	/**
	 * Get the requirements for this award
	 *
	 * @return void
	 */
	public function requirements()
	{
		return $this->belongsToMany('App\Award', 'award_requirements');
	}

	/**
	 * Get awards that have this award as a requirement
	 *
	 * @return void
	 */
	public function awards_where_is_requirement()
	{
		return $this->belongsToMany('App\Award', 'award_requirements', 'requirement_id');
	}

	/**
	 * Get the users that have this award
	 *
	 * @return void
	 */
	public function users()
	{
		return $this->belongsToMany('App\User', 'user_awards', 'award_id', 'user_uuid', 'id', 'uuid');
	}
}
