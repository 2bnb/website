<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model implements Auditable
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
		'media',
		'uploader_uuid',
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
		'media' => null,
		'uploader_uuid' => null
	];

	/**
	 * Get the user that uploaded the resource
	 */
	public function uploader()
	{
		return $this->belongsTo('App\User', 'uploader_uuid', 'uuid');
	}
}
