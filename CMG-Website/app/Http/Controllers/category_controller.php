<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class category_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categor = category::all();
        return view('backend.category.show_category', ["categor"=>$categor]);
    }
    public function create()
    {
        return view('backend.category.create_category');
    }
    public function store(Request $request)
    {
        $request->validate(['cname' => 'required']);
        $cates = new category;
        $cates->n_cate = $request->cname;
        $cates->save();

        return redirect()->route('backend.category.index')->with('success', 'เพิ่มหมวดหมู่ '.$request->cname.' สำเร็จ!');
    }
    public function edit(category $category)
    {
        return view('backend.category.edit_category',['category'=>$category]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['cname' => 'required']);
        $cates = category::find($id);
        $oldname = $cates->n_cate;
        $cates->n_cate = $request->cname;
        if ($cates->save()) {
            return redirect()->route('backend.category.index')->with('success', 'อัพเดทหมวดหมู่ ' . $oldname . ' เป็น ' . $request->cname . ' สำเร็จ!');
        } else {
            return redirect()->route('backend.category.index')->with('failed', 'อัพเดทหมวดหมู่ ' . $oldname . ' เป็น ' . $request->cname . ' ไม่สำเร็จ.');
        }
    }
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $categoryName = $category->n_cate;

        if ($category->delete()) {
            return redirect()->route('backend.category.index')->with('success', 'หมวดหมู่ ' . $categoryName . ' ถูกลบเรียบร้อยแล้ว.');
        } else {
            return redirect()->route('backend.category.index')->with('failed', 'หมวดหมู่ ' . $categoryName . ' ไม่สามารถลบได้');
        }
    }
}
