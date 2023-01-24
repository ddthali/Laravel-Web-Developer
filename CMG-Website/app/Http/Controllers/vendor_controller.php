<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;

class vendor_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $vendor = vendor::all();
        return view('backend.vendor.vendor_list',['vendor' => $vendor]);
    }
    public function create()
    {
        return view('backend.vendor.create_vendor');
    }
    public function store(Request $request)
    {
        $request->validate(['corpname' => 'required','maintype' => 'required', 'checkBox' => 'required|array|min:1']);
        $checkBox = $request->input('checkBox');
        $subtype = implode(",", $checkBox);

        $vendor = new vendor;
        $vendor->v_client = $request->corpname;
        $vendor->v_main = $request->maintype;
        $vendor->v_sub = $subtype;
        $vendor->save();

        return redirect()->route('backend.vendor.index')->with('success', 'เพิ่มบริษัทผู้จำหน่าย ' . $request->corpname . ' สำเร็จ!');
    }
    public function edit($id)
    {
        $vendor = vendor::find($id);
        return view('backend.vendor.edit_vendor', ['vendor' => $vendor]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['corpname' => 'required','maintype' => 'required', 'checkBox' => 'required|array|min:1']);
        $checkBox = $request->input('checkBox');
        $subtype = implode(",", $checkBox);

        $vendor = vendor::find($id);
        $vendor->v_client = $request->corpname;
        $vendor->v_main = $request->maintype;
        $vendor->v_sub = $subtype;

        if ($vendor->save()) {
            return redirect()->route('backend.vendor.index')->with('success', 'แก้ไขบริษัทผู้จำหน่าย ID ที่ '. $id .' สำเร็จ!');
        } else {
            return redirect()->route('backend.vendor.index')->with('failed', 'แก้ไขบริษัทผู้จำหน่าย ID ที่ '. $id .' ล้มเหลว.');
        }
    }
    public function destroy($id)
    {
        $vendor = vendor::findOrFail($id);
        $vName = $vendor->v_client;

        if ($vendor->delete()) {
            return redirect()->route('backend.vendor.index')->with('success', 'ลบบริษัทผู้จำหน่าย '. $vName .' สำเร็จ!');
        } else {
            return redirect()->route('backend.vendor.index')->with('failed', 'ลบบริษัทผู้จำหน่าย '. $vName .' ล้มเหลว.');
        }
    }
}
