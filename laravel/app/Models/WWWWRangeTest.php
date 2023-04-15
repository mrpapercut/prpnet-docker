<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WWWWRangeTest extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'WWWWRangeTest';

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
    protected $primaryKey = 'TestID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'LowerLimit',
        'UpperLimit',
        'TestID',
        'EmailID',
        'UserID',
        'MachineID',
        'InstanceID',
        'TeamID',
        'SecondsToTestRange',
        'SearchingProgram',
        'SearchingProgramVersion',
        'PrimesTested',
        'CheckSum'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
}
