<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployEE extends Model
{
    protected $table = 'employee';

    public static function getAllRecords()
    {
        return self::all();
    }
}
