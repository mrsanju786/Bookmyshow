<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'title',
        'event_image',
        'category_id',
        'address',
        'lat_address',
        'long_address',
        'street1',
        'street2',
        'languages',
        'short_description',
        'long_description',
        'ticket_name',
        'ticket_type',
        'ticket_qty',
        'ticket_price',
        'created_by',
    ];
}
