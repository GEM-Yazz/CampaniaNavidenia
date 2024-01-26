<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerTarget extends Model {
    protected $table    = 'wp_player_targets';
    protected $fillable = [
        'player_id',

        'fullname',
        'age',
        'relationship',
        'genre',

        'behaviour1',
        'behaviour2',
        'behaviour3',

        'activity1',
        'activity2',
        'activity3',

        'importance',
        'gift',
    ];
}
