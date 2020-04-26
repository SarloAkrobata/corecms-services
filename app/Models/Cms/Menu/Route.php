<?php

namespace App\Models\Cms\Menu;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = [
        'route_path',
        'route_name',
        'page_id',
        'parent_route',
        'order_number',
        'menu_id'
    ];

}
