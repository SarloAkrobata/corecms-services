<?php

namespace App\Models\Frontend;

use App\Models\Cms\Menu\Menu;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
