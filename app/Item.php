<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'total',
        'condition',
        'registration_date',
        'type_id',
        'room_id',
        'user_id',
        'item_code',
    ];

    public function type()
    {
        return $this->hasOne('App\Type','id','type_id');
    }

    public function room()
    {
        return $this->hasOne('App\Room','id','room_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
