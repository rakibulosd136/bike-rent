<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'bike_name',
        'hours',
        'total_rent',
        'nid_file',
        'dl_file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}