<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bot extends Model
{
	use SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'description',
		'attributes'
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
		'description' => '',
		'attributes' => '{}'
	];
}
