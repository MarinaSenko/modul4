<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function getConfig()
    {
        $config = Config::findOrFail(1)->toArray();
        config(['settings'=> $config]);
        dd(config());
    }
}
