<?php

namespace App\Models;

use App\Traits\RolesTrait;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use RolesTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'surname',
        'date_of_birth',
        'phone_number',
        'address',
        'country',
        'trading_account_number',
        'balance',
        'open_trades',
        'close_trades',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
