<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CandidateTest extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CandidateTest';

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
        'TestID',
        'IsCompleted',
        'EmailID',
        'UserID',
        'MachineID',
        'InstanceID',
        'TeamID',
        'EmailSent',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    public function Candidate(): BelongsTo {
        return $this->belongsTo(Candidate::class, 'CandidateName', 'CandidateName');
    }

    public function CandidateTestResult(): HasOne {
        return $this->hasOne(CandidateTestResult::class, 'CandidateName', 'CandidateName');
    }
}
