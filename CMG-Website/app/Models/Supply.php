<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $table = 'supplies';
    protected $primaryKey = 's_id';
    public static function SupplyGroup($column,$value)
    {
        return self::where($column, $value)->get();
    }
}
