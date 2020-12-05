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
		'award_type_id',
		'description',
		'document_link',
		'icon_id',
		'owner_uuid'
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'name' => null,
        'description' => '',
		'icon_id' => null,
		'award_type_id' => null,
		'document_link' => null,
		'icon_id' => null,
		'owner_uuid' => null,
	];

	/**
	 * Get the type of this award
	 *
	 * @return App\AwardType
	 */
	public function award_type()
	{
		return $this->belongsTo('App\AwardType');
	}


	/**
	 * Get the icon for this award
	 *
	 * @return App\Resource
	 */
	public function icon()
	{
		return $this->belongsTo('App\Resource', 'icon_id');
	}

	/**
	 * Get the requirements for this award
	 *
	 * @return App\Award
	 */
	public function requirements()
	{
		return $this->belongsToMany('App\Award', 'award_requirements');
	}

	/**
	 * Get awards that have this award as a requirement
	 *
	 * @return App\Award
	 */
	public function awards_where_is_requirement()
	{
		return $this->belongsToMany('App\Award', 'award_requirements', 'requirement_id');
	}

	/**
	 * Get the users that have this award
	 *
	 * @return App\User
	 */
	public function users()
	{
		return $this->belongsToMany('App\User', 'user_awards', 'award_id', 'user_uuid', 'id', 'uuid');
	}

	/**
	 * Get slots that require this award
	 *
	 * @return App\Slot
	 */
	public function slots()
	{
		return $this->belongsToMany('App\Slot', 'slot_requirements', 'requirement_id', 'slot_id');
	}

	/**
	 * Get all qualifications that relate to this award
	 *
	 * @return void
	 */
	public function qualifications() {
		return $this->hasMany('App\Qualification');
	}
}
