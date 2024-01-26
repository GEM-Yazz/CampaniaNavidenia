<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {
    protected $table    = 'wp_players';
    protected $fillable = [
        'firstname',
        'lastname',
        'dni',
        'phone',
        'email',
        'department',
        'province',
        'district',

        'politics',
        'terms'
    ];
}
