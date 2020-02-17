<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caravan extends Model
{

    protected $fillable = [
        'user_id', 'currentPosition', 'latestPosition','staringTime','endingTime','city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodRequests()
    {
        return $this->hasMany(BloodRequest::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
}
