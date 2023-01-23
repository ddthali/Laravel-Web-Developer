<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gallerymodeler extends Model
{
    protected $table = 'img_gallery';

    public static function show_record($imgcate,$subcate)
    {
        if (!$subcate) {
            return self::where('img_cate', $imgcate)->get();
        } else {
            return self::where('img_cate', $imgcate)->where('sub_cate', $subcate)->get();
        }
    }
    public function workExp()
    {
        return $this->belongsTo('App\Models\portfolio', 'sub_cate', 'w_id');
    }

    public function imgCategory()
    {
        return $this->belongsTo('App\Models\category', 'img_cate', 'id');
    }
}
