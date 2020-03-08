<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    public function route()
    {
        return $this->hasMany(Route::class);
    }
}
