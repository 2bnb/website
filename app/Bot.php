<?php

namespace App;

use Illuminate\Support\Str;
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
		'name' => null,
		'description' => '',
		'attributes' => '{}'
	];


	   /**
     * Don't allow incrementing since we're using uuids
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The primary key column name
     *
     * @var  string
     */
	protected $primaryKey = 'uuid';

    /**
     * Auto-generate and fill the uuid field
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($bot) {
            $bot->{$bot->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * Force keytype to string since it's a uuid not an id
     */
    public function getKeyType()
    {
        return 'string';
	}

	/**
	 * Get all logs for this bot
	 *
	 * @return void
	 */
	public function logs()
	{
		return $this->hasMany('App\BotLog', 'bot_uuid', 'uuid');
	}
}
