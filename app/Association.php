<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{

    protected $fillable = [
        'name', 'director', 'website','descrption','address','user_id',
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
