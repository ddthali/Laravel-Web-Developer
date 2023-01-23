<?php

namespace App\Http\Controllers;

use App\Models\EmployEE;
use Illuminate\Http\Request;

class EmployEE_controller extends Controller
{
    //
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
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
