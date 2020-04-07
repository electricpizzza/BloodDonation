<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $garded =[];
    protected $fillable = [
        'bloodType','city','description','address','deadline',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
