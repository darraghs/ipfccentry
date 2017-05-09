<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionStatus extends Model
{
    //
    protected $table = 'competition_statuses';

    protected $fillable = ['current'];
}
