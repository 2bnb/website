<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
	use HasApiTokens, Notifiable, \OwenIt\Auditing\Auditable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'join_date',
		'discord_id',
		'discord_access_token',
		'avatar_resource_id',
		'date_of_birth',
		'country',
		'timezone',
		'data',
		'rank_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'discord_access_token',
	];

	/**
	 * The model's default values for attributes
	 *
	 * @var  array
	 */
	protected $attributes = [
		'join_date' => null,
		'discord_access_token' => null,
		'avatar_resource_id' => null,
		'country' => null,
		'timezone' => 'UTC+00:00',
		'data' => '{}',
		'rank_id' => null
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'data' => 'array',
	];

	/**
	 * Don't allow incrememnting since we're using uuids
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
		static::creating(function ($user) {
			$user->{$user->getKeyName()} = (string) Str::uuid();

			$user->attributes['avatar_resource_id'] = Config::where('name', 'default_avatar')->first() || null;
			$user->attributes['data'] = json_encode([]);
		});
	}

	/**
	 * Force keytype to string since it's a uuid not an id
	 */
	public function getKeyType()
	{
		return 'string';
	}
}
