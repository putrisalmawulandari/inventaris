<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    protected $fillable = [
        'borrow_id',
        'item_id',
        'total',
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
