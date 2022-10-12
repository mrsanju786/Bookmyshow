<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTimeSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_date',
        'event_start_time',
        'event_end_time',
    ];
}
