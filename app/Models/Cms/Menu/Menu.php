<?php

namespace App\Models\Cms\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function route()
    {
        return $this->hasMany(Route::class);
    }
}
