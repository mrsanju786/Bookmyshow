<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSaleSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_sale_date',
        'ticket_sale_start_time',
        'ticket_sale_end_time',
    ];
}
