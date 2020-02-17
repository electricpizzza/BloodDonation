<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'image','caravan_id','association_id'
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
