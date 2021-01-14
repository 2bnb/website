<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardType extends Model implements Auditable
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
		'description',
		'name',
	];

	/**
	 * The model's default values for attributes
	 *
	 * @var array
	 */
	protected $attributes = [
		'description' => '',
		'name' => null,
	];


	/**
	 * Get all awards of this type
	 *
	 * @return Collection
	 */
	public function awards()
	{
		return $this->hasMany('App\Award');
	}
}
