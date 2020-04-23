<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotLog extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data',
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
		'data' => 'did something, so I am logging it',
	];
}
