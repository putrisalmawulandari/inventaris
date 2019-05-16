<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'item_id',
        'user_id',
        'total',
        'supply_date',  
    ];

    // protected $guarded = [];

    public function item()
    {
        return $this->hasOne('App\Item','id','item_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
