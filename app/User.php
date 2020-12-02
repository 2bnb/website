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
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'join_date', 'date_of_birth'];

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

    /**
     * Get all Resources uploaded by the user
     *
     * @return void
     */
    public function uploadedResources()
    {
        return $this->hasMany('App\Resource', 'uploader_uuid', 'uuid');
    }

    /**
     * Get all Absences for this user
     *
     * @return void
     */
    public function absences()
    {
        return $this->hasMany('App\Absence', 'user_uuid', 'uuid');
	}

	/**
	 * Get the rank of this user
	 *
	 * @return void
	 */
	public function rank()
	{
		return $this->belongsTo('App\Rank');
	}

	/**
	 * Get the awards that this user has
	 *
	 * @return void
	 */
	public function awards()
	{
		return $this->belongsToMany('App\Award', 'user_awards', 'user_uuid', 'award_id', 'uuid');
	}

	/**
	 * Get all event slots for this user
	 *
	 * @return void
	 */
	public function event_slots()
	{
		return $this->hasMany('App\EventSlot', 'user_uuid', 'uuid');
	}

	/**
	 * Get all the posts that this user can edit
	 *
	 * @return void
	 */
	public function editable_posts()
	{
		return $this->belongsToMany('App\Post', 'user_edit_post_permissions', 'user_uuid', 'post_id', 'uuid');
	}

	/**
	 * Get all the events that this user can edit
	 *
	 * @return void
	 */
	public function editable_events()
	{
		return $this->belongsToMany('App\Event', 'user_edit_event_permissions', 'user_uuid', 'event_id', 'uuid');
	}

	/**
	 * Get all misbehaviours for this user
	 *
	 * @return void
	 */
	public function misbehaviours()
	{
		return $this->hasMany('App\Misbehaviour', 'user_uuid', 'uuid');
	}

	/**
	 * Get all misbehaviours that this user has issued
	 *
	 * @return void
	 */
	public function issued_misbehaviours()
	{
		return $this->hasMany('App\Misbehaviour', 'issuer_uuid', 'uuid');
	}

    /**
     * Get all Donations for this user
     *
     * @return void
     */
    public function donations()
    {
        return $this->hasMany('App\Donation', 'donator_uuid', 'uuid');
	}

    /**
     * Get all Posts that this user created
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'author_uuid', 'uuid');
	}


	/**
	 * Get all the roles that this user has
	 *
	 * @return void
	 */
	public function roles()
	{
		return $this->belongsToMany('App\Role', 'user_roles', 'user_uuid', 'role_id', 'uuid');
	}
}
