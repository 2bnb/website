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
		'bot_uuid'
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
		'bot_uuid' => '',
		'data' => '{"message": "This bot did something, so I am logging it"}',
	];


	/**
	 * Get bot for this log
	 *
	 * @return void
	 */
	public function bot()
	{
		return $this->belongsTo('App\Bot', 'uuid', 'bot_uuid');
	}
}
