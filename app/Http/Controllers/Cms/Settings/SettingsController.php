<?php

namespace App\Http\Controllers\Cms\Settings;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function all()
    {
        return response()->json(['base_url' => config('app.url')]);
    }

}
