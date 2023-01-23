<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'img_category';
    public static function getAllCategory()
    {
        return self::all();
    }
}
