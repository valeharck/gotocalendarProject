<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'rec_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'timestamps'
    ];


    public function recordatorios()
    {
        return $this->belongsTo('App\recordatorios');
    }
}
