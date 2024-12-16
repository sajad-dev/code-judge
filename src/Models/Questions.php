<?php

namespace SajadDev\CodeJudge\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Questions extends Model
{
    protected $guarded = ['id'];

    public function arbitration(): HasOne
    {
        return $this->hasOne(Arbitration::class);
    }
    public function participants()
    {
        return $this->hasMany(Participants::class);
    }
}
