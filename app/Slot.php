<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model implements Auditable
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
		'is_leadership',
		'is_preset',
		'position'
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'name' => null,
        'description' => '',
        'is_leadership' => false,
		'is_preset' => false,
		'position' => 0
	];

	/**
	 * Get required awards for this slot
	 *
	 * @return void
	 */
	public function requirements()
	{
		return $this->belongsToMany('App\Award', 'slot_requirements', 'slot_id', 'requirement_id');
	}
}
