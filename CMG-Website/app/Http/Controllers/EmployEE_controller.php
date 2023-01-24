<?php

namespace App\Http\Controllers;

use App\Models\EmployEE;
use Illuminate\Http\Request;

class EmployEE_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $emp = EmployEE::all();
        return view('backend.employee.list_employee', ['emp'=>$emp]);
    }
    public function create()
    {
        return view('backend.employee.create_employee');
    }
    public function store(Request $request)
    {
        $request->validate(['ename' => 'required', 'etotal' => 'required']);
        $emp = new EmployEE;
        $emp->name = $request->ename;
        $emp->total = $request->etotal;
        $emp->save();

        return redirect()->route('backend.employee.index')->with('success', 'เพิ่มตำแหน่งงาน ' . $request->ename . ' สำเร็จ!' );
    }
    public function edit($id)
    {
        $emp = EmployEE::find($id);
        return view('backend.employee.edit_employee', ['emp' => $emp]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['ename'=>'required','etotal'=>'required']);
        $emp = EmployEE::findOrFail($id);
        $emp->name = $request->ename;
        $emp->total = $request->etotal;
        if ($emp->save()) {
            return redirect()->route('backend.employee.index')->with('success', 'อัพเดทตำแหน่งงาน ID ที่ '. $id .' สำเร็จ!');
        } else {
            return redirect()->route('backend.employee.index')->with('failed', 'อัพเดทตำแหน่งงาน ID ที่ '. $id .' ล้มเหลว.');
        }
    }
    public function destroy($id)
    {
        $emp = EmployEE::findOrFail($id);
        $empName = $emp->name;
        if ($emp->delete()) {
            return redirect()->route('backend.employee.index')->with('success', 'ลบตำแหน่งงาน ' . $empName . ' สำเร็จ!');
        } else {
            return redirect()->route('backend.employee.index')->with('failed', 'ลบตำแหน่งงาน ' . $empName . ' ไม่สำเร็จ.');
        }
    }
}
