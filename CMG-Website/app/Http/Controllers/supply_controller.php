<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

class supply_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $supplies = Supply::all();
        return view('backend.supply.supply_list', ['supplies'  => $supplies]);
    }
    public function create()
    {
        return view('backend.supply.create_supply');
    }
    public function store(Request $request)
    {
        $request->validate(['sname'=>'required','stype'=>'required','stotal'=>'required']);
        $supplyer = new Supply;
        $supplyer->s_name = $request->sname;
        $supplyer->s_type = $request->stype;
        $supplyer->s_total = $request->stotal;
        $supplyer->save();

        return redirect()->route('backend.supply.index')->with('success', 'เพิ่มอุปกรณ์ ' . $request->sname . ' แล้ว.');
    }
    public function edit($id)
    {
        $supplyer = Supply::find($id);
        return view('backend.supply.edit_supply', ['supplies' => $supplyer]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['sname' => 'required', 'stype' => 'required', 'stotal' => 'required']);
        $supplyer = Supply::find($id);
        $supplyer->s_name = $request->sname;
        $supplyer->s_type = $request->stype;
        $supplyer->s_total = $request->stotal;
        $supplyer->save();

        return redirect()->route('backend.supply.index')->with('success', 'แก้ไขอุปกรณ์ ID ที่ ' . $supplyer->s_id . ' สำเร็จ!');
    }
    public function destroy($id)
    {
        $supplyer = Supply::findOrFail($id);
        $sppName = $supplyer->s_name;

        if ($supplyer->delete()) {
            return redirect()->route('backend.supply.index')->with('success', 'อุปกรณ์ ' . $sppName . ' ถูกลบเรียบร้อยแล้ว.');
        } else {
            return redirect()->route('backend.supply.index')->with('failed', 'อุปกรณ์ ' . $sppName . ' ไม่สามารถลบได้');
        }
    }
}
