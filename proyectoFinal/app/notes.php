<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $fillable = [
        'nota'
    ];

    protected $guarded = [
        'id', 'user_id', 'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
