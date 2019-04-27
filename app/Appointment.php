<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Appointment extends Model
{
    protected $guarded = [];

    public function getRegisterDateAttribute()
    {
        return Carbon::parse($this->register_at)->format('Y-m-d');
    }
}
