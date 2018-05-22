<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $fillable = [
        'nota','user_id'
    ];

    protected $guarded = [
        'id', 'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
