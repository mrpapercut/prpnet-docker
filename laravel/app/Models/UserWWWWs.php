<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWWWWs extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'UserWWWWs';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'UserID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'UserID',
        'Prime',
        'Remainder',
        'Quotient',
        'MachineID',
        'InstanceID',
        'TeamID',
        'DateReported',
        'ShowOnWebpage',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
}
