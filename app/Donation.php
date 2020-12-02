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
		'donator_uuid',
		'description',
		'amount',
		'paypal_transaction_id',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'donator_uuid' => null,
		'description' => null,
		'amount' => 0.00,
        'paypal_transaction_id' => null,
	];


	/**
	 * Get user who donated
	 *
	 * @return void
	 */
	public function donator()
	{
		return $this->belongsTo('App\User', 'uuid', 'donator_uuid');
	}
}
