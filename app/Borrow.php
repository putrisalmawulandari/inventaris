<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'user_id',
        'employee_id',
        'borrow_date',
        'return_date',
        'status',
        'approve',
    ];

    public function employee()
    {
        return $this->hasOne('App\Employee','id','employee_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function cart()
    {
        return $this->hasMany('App\BorrowDetail','borrow_id','id');
    }
}
