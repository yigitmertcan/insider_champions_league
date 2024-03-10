<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
class DataManageServices
{
    public static function getData($id)
    {
        return Cache::get($id);
    }

    public static function setData($id,$value)
    {
        Cache::set($id,$value);
    }
}
