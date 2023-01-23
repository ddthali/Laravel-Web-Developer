<?php

namespace App\Http\Controllers;

use App\Models\gallerymodeler;
use App\Models\category;
use App\Models\portfolio;
use App\Models\subcate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Gallery extends Controller
{
    //Create
    public function index()
    {
        $gallery = GalleryModeler::select('img_gallery.id','img_gallery.path','img_gallery.img_cate','img_category.n_cate','img_gallery.sub_cate','work_exp.w_project')
        ->join('img_category', 'img_category.id', '=', 'img_gallery.img_cate')
        ->join('work_exp', 'work_exp.w_id', '=', 'img_gallery.sub_cate')
        ->get();
        return view('backend.gallery.gallery', ['gallery'=>$gallery]);
    }

    public function create()
    {
        $cate = category::all();
        $wexp = subcate::all();
        return view('backend.gallery.upload_img',['cate'=>$cate, 'wexp'=>$wexp]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcate'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $cate = category::find($request->category);
        $request->file('image')->storeAs('public/'.$cate->n_cate, $request->file('image')->getClientOriginalName());

        $slide = new gallerymodeler;
        $slide->img_cate = $request->category;
        $slide->sub_cate = $request->subcate;
        $slide->path = $cate->n_cate.'/'.$request->file('image')->getClientOriginalName();
        $slide->save();

        return redirect()->route('backend.gallery.index')->with('success', 'เพิ่มรูปภาพในหมวดหมู่ '.$cate->n_cate.' สำเร็จ!');
    }

    public function edit(gallerymodeler $gallery)
    {
        $cate = category::all();
        $wexp = subcate::all();

        return view('backend.gallery.edit_img', ['gallery'=>$gallery,'cate'=>$cate, 'wexp'=>$wexp]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['category'=>'required','subcate'=>'required','image' => 'required|image|mimes:jpeg,png,jpg']);

        $slide = gallerymodeler::find($id);
        if (Storage::exists('public/' . $slide->path))
        {
            Storage::delete('public/' . $slide->path);

        }
        $cate = category::find($request->category);
        $request->file('image')->storeAs('public/'.$cate->n_cate, $request->file('image')->getClientOriginalName());
        $slide->img_cate = $request->category;
        $slide->sub_cate = $request->subcate;
        $slide->path = $cate->n_cate.'/'.$request->file('image')->getClientOriginalName();
        $slide->save();

        return redirect()->route('backend.gallery.index')->with('success', 'อัพเดทรูป id ที่ '.$id.' สำเร็จ!');
    }

    public function destroy(gallerymodeler $gallery)
    {
        if (Storage::exists('public/' . $gallery->path))
        {
            Storage::delete('public/' . $gallery->path);
            $gallery->delete();

            return redirect()->route('backend.gallery.index')->with('success', 'รูปภาพ id ที่ ' . $gallery->id. ' ถูกลบเรียบร้อยแล้ว');
        } else {
            $catedb = category::find($gallery->img_cate);
            if(str_contains($gallery->path, $catedb->n_cate.'/'))
            {
                $dlen = strlen($catedb->n_cate);
                $dirs = substr($gallery->path,$dlen+1);
            } else {
                $parts = explode('/', $gallery->path);
                $dirs = end($parts);
            }
            return redirect()->route('backend.gallery.index')->with('failed', 'รูปภาพ id ที่ ' . $gallery->id. " ไม่สามารถลบได้เนื่องจากไฟล์อาจไม่มีอยู่หรือไฟล์ไม่ถูกต้อง. หากต้องการลบกรุณาไปลบที่ฐานข้อมูลหรืออัพไฟล์ ".$dirs." ลงในที่อยู่ของรูปก่อนแล้วค่อยลบรูปนี้");
        }
    }
}
