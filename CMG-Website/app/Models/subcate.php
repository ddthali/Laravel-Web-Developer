<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcate extends Model
{
    protected $table = 's_category';
    protected $primaryKey = 'sc_id';
    public static function getLatest()
    {
        return self::orderBy('sub_cate', 'desc')->first();
    }
}
