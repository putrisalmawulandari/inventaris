<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'borrow_id',
        'item_id',
        'total',
        'description',
        'fixed',
        'broken_date',
        'fix_date',
    ];

    public function borrow()
    {
        return $this->hasOne('App\Borrow','id','borrow_id');
    }

    public function item()
    {
        return $this->hasOne('App\Item','id','item_id');
    }
}
