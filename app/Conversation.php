<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'user_id', 'blood_request_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodrequest()
    {
        return $this->belongsTo(BloodRequest::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
