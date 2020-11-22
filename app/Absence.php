<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absence extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'description',
		'start',
		'end',
		'user_uuid',
	];

	/**
	 * The model's default values for attributes
	 *
	 * @var array
	 */
	protected $attributes = [
		'description' => '',
		'start' => null,
		'end' => null,
		'user_uuid' => null
	];

	/**
	 * Get user who shall be absent
	 *
	 * @return void
	 */
	public function user()
	{
		return $this->belongsTo('App\User', 'uuid', 'user_uuid');
	}
}
