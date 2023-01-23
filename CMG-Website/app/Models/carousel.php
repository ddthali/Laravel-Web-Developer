<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carousel extends Model
{
    protected $table = 'carousel';

    public static function getAll()
    {
        return self::orderBy('sq_order','asc')->get();
    }
    public static function getLatest()
    {
        return self::orderBy('sq_order', 'desc')->first();
    }
}
