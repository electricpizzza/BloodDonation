<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $fillable = [
        'latestDonation', 'timePeriod', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
