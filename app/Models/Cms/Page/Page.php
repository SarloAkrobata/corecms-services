<?php

namespace App\Models\Cms\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'title', 'description', 'content', 'layout', 'published', 'album_id', 'menu_id'
    ];

}
