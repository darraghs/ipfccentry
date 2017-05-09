<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubEntry extends Model
{
    //
    protected $fillable = [
        'club_id', 'status', 'payment', 'panel_number'
    ];

    protected $primaryKey = 'club_id';
}
