<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model implements Auditable
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
		'group_id',
		'icon_id',
        'level',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'name' => null,
        'description' => '',
        'group_id' => null,
        'icon_id' => null,
        'level' => 0
	];

	/**
	 * Get the rank group that this rank is a part of
	 *
	 * @return void
	 */
	public function rank_group()
	{
		return $this->belongsTo('App\RankGroup', 'group_id');
	}

	/**
	 * Get the icon for this rank
	 *
	 * @return void
	 */
	public function icon()
	{
		return $this->belongsTo('App\Resource', 'icon_id');
	}

	/**
	 * Get all users that have this rank
	 *
	 * @return void
	 */
	public function users()
	{
		return $this->hasMany('App\User');
	}
}
