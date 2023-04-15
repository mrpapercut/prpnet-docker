<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneferROE extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'GeneferROE';

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
    protected $primaryKey = 'CandidateName';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'CandidateName',
        'GeneferVersion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
}
