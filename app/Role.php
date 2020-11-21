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

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id');
	}
}
