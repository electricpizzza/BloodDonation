<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'bloodType','city','hospital','address','nbMax',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
