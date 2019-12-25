<?php

namespace Sp\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;


class EventEloquentModel extends Model
{

    protected $table = 'event';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_body', 'type_name', 'ocurred_on'
    ];

}
