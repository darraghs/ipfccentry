<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubPanel extends Model
{
    protected $fillable = [
        'club_id',
        'image_type',
        'image_id'
    ];
}
