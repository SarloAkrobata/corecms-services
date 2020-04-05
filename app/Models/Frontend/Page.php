<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'title', 'description', 'content', 'layout', 'published'
    ];

    public function route()
    {
        return $this->hasMany(Route::class);
    }
}
