<?php

namespace App\Models\Cms\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * @return BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
