<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable, SoftDeletes;

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
}
