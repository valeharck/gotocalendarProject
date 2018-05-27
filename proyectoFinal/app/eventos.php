<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventos extends Model
{
    protected $fillable = [
        'title','allDay','fecha_ini','fecha_fin','user_id'
    ];

    protected $guarded = [
        'id', 'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
