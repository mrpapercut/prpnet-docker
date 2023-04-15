<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WWWWGroupStats extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'WWWWGroupStats';

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'CountInGroup',
        'CountInProgress',
        'CountTested',
        'CountDoubleChecked',
        'CountUntested',
        'MinInGroup',
        'MaxInGroup',
        'CompletedThru',
        'LeadingEdge',
        'WWWWPrimes',
        'NearWWWWPrimes',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
}
