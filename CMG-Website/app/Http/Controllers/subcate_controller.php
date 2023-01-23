<?php

namespace App\Http\Controllers;

use App\Models\subcate;
use Illuminate\Http\Request;

class subcate_controller extends Controller
{
    //
    public function index()
    {
        $subc = subcate::all();
        return view('backend.subcategory.show_subcategory',['subc'=>$subc]);
    }
    public function create()
    {
        return view('backend.subcategory.create_subcategory');
    }
    public function store(Request $request)
    {
        $request->validate(['cname'=>'required']);
        $latest = subcate::getLatest();

        $scate = new subcate;
        $scate->name = $request->cname;
        $scate->sub_cate = $latest->sub_cate + 1;
        $scate->save();

        return redirect()->route('backend.subcategory.index')->with('success', 'เพิ่มหมวดหมู่ ' . $request->cname . ' สำเร็จ!');
    }
    public function edit($id)
    {
        $cates = subcate::find($id);
        return view('backend.subcategory.edit_subcategory', ['scate'=>$cates]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['cname' => 'required']);
        $cates = subcate::find($id);
        $oldname = $cates->name;
        $cates->name = $request->cname;
        if ($cates->save()) {
            return redirect()->route('backend.subcategory.index')->with('success', 'อัพเดทหมวดหมู่ ' . $oldname . ' เป็น ' . $request->cname . ' สำเร็จ!');
        } else {
            return redirect()->route('backend.subcategory.index')->with('failed', 'อัพเดทหมวดหมู่ ' . $oldname . ' เป็น ' . $request->cname . ' ไม่สำเร็จ.');
        }
    }
    public function destroy($id)
    {
        $category = subcate::findOrFail($id);
        $categoryName = $category->name;

        if ($category->delete()) {
            return redirect()->route('backend.subcategory.index')->with('success', 'หมวดหมู่ ' . $categoryName . ' ถูกลบเรียบร้อยแล้ว.');
        } else {
            return redirect()->route('backend.subcategory.index')->with('failed', 'หมวดหมู่ ' . $categoryName . ' ไม่สามารถลบได้');
        }
    }
}
