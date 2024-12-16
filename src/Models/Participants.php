<?php

namespace SajadDev\CodeJudge\Models;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $guarded = ['id'];

    public function queastions() {
        return $this->belongsTo(Questions::class);
    }
}
