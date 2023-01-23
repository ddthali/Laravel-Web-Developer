<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mh_record extends Model
{
    protected $table = 'mh_record';

    public static function getAllRecords()
    {
        return self::all();
    }
}
