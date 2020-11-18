<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RankGroup extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

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
}
