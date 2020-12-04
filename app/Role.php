<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Role extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes, HasApiTokens;

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
        'icon_id',
        'discord_role_id',
        'description',
        'position',
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
        'name' => null,
        'icon_id' => null,
        'discord_role_id' => null,
        'description' => '',
        'position' => 0,
	];

	/**
	 * Get the icon for this role
	 *
	 * @return void
	 */
	public function icon()
	{
		return $this->belongsTo('App\Resource', 'icon_id');
	}

	/**
	 * Get all permissions that this role has
	 *
	 * @return void
	 */
	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id');
	}


	/**
	 * Get all users that have this role
	 *
	 * @return void
	 */
	public function users()
	{
		return $this->belongsToMany('App\User', 'user_roles', 'role_id', 'user_uuid');
	}

	/**
	 * Get all posts that require this role (minimum)
	 *
	 * @return void
	 */
	public function posts_that_require_role()
	{
		return $this->hasMany('App\Post', 'minimum_role_to_view');
	}
}
