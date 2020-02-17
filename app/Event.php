<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'city','address','dateEnd','dateStart','startsAt','endsAt','caravan_id','association_id'
    ];

    public function caravan()
    {
        return $this->belongsTo(Caravan::class);
    }

    public function association()
    {
        return $this->belongsTo(Association::class);
    }
}
