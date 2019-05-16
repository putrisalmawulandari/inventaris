<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Employee extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [
        'name',
        'nip',
        'password',
        'remember_token',
        'address',
    ];
}

// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;

// class Employee extends Model implements AuthenticatableContracts
// {
//     use Authenticatable;
    
//     protected $fillable = [
//         'nip',
//         'password',
//         'name',
//         'address',
//         'remember_token',
//     ];
// }
