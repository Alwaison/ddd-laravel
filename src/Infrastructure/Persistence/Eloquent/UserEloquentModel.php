<?php

Namespace Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserEloquentModel extends Model
{

    protected $table = 'sp_users';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'employee_id', 'name', 'email', 'password', 'token', 'token_valid_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $attributes = [
        'token' => null,
        'token_valid_until' => null
    ];

}
