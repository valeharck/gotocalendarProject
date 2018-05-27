<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recordatorios extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'user_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'timestamps'
    ];



    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks()
    {
        return $this->hasMany('App\tasks');
    }
}
