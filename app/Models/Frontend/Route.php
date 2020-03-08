<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
