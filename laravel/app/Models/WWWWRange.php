<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WWWWRange extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'WWWWRange';

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
    protected $primaryKey = 'LowerLimit';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'LowerLimit',
        'UpperLimit',
        'CompletedTests',
        'HasPendingTest',
        'DoubleChecked',
        'LastUpdateTime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
}
