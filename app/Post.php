<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['published_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'description',
		'author_uuid',
		'minimum_role_to_view',
		'type',
		'custom_attributes',
		'allow_comments',
		'freeze_comments',
		'published_at'
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
		'name' => null,
		'description' => null,
        'author_uuid' => null,
        'minimum_role_to_view' => null,
        'type' => null,
        'custom_attributes' => null,
        'allow_comments' => null,
        'freeze_comments' => null,
        'published_at' => null,
	];

	/**
	 * Get author of the post
	 *
	 * @return App\User
	 */
	public function author()
	{
		return $this->belongsTo('App\User', 'uuid', 'author_uuid');
	}

	/**
	 * Get minimum role required to view this post
	 *
	 * @return App\Role
	 */
	public function minimum_role_to_view()
	{
		return $this->belongsTo('App\Role', 'id', 'minimum_role_to_view');
	}

	/**
	 * Get all users that can edit this post
	 *
	 * @return void
	 */
	public function users_that_can_edit()
	{
		return $this->belongsToMany('App\User', 'user_edit_post_permissions', 'post_id', 'user_uuid');
	}
}
