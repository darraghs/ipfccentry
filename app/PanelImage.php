<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PanelImage extends Model
{
    protected $fillable = [
        'image',
        'author_name',
        'author_email',
        'title',
        'Judge1_Score',
        'Judge2_Score',
        'Judge3_Score',
        'award',
        'panel_order',
        'substitue'
    ];
}



