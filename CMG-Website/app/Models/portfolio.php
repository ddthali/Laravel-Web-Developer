<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{

    protected $table = 'work_exp';

    public static function getAll()
    {
        return self::all();
    }

}
