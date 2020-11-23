<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventSlot extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

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
        'user_uuid',
        'username',
        'slot_id',
        'event_slot_group_id',
    ];

    /**
     * The model's default values for attributes
     *
     * @var array
     */
    protected $attributes = [
        'user_uuid' => null,
        'username' => null,
        'slot_id' => null,
        'event_slot_group_id' => null,
    ];

    /**
     * Get the user that has signed up for this slot
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'uuid', 'user_uuid');
    }

    /**
     * Get the group for this slot
     *
     * @return void
     */
    public function event_slot_group()
    {
        return $this->belongsTo('App\EventSlotGroup');
    }

    /**
     * Get the actual slot that this event is using
     *
     * @return void
     */
    public function slot()
    {
        return $this->belongsTo('App\Slot');
    }
}
