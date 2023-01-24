<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table = 'vendor';
    protected $primaryKey = 'v_id';
    public static function getVendorBySub($column1,$column2,$main,$value)
    {
        return self::where($column1,$main)
        ->whereRaw("$column2 REGEXP '.*{$value}.*'")
        ->get();
    }
}
