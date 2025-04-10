<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = ['passanger_name','passanger_phone','seat_number','flight_id'];
    public function flights():BelongsTo{
        return $this->belongsTo(Ticket::class);
    }
}
