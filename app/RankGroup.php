<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RankGroup extends Model implements Auditable
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
        'icon_id' => null,
	];

	/**
	 * Get all ranks for this rank group
	 *
	 * @return void
	 */
	public function ranks()
	{
		return $this->hasMany('App\Rank', 'group_id');
	}

	/**
	 * Get the icon for this rank group
	 *
	 * @return void
	 */
	public function icon()
	{
		return $this->belongsTo('App\Resource', 'icon_id');
	}
}
