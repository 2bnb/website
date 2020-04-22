<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'model',
        'description',
    ];

    /**
     * The model's default values for attributes
     *
     * @var  array
     */
    protected $attributes = [
        'type' => null,
        'model' => null,
        'description' => null
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id');
	}
}
