<?php

namespace App\Http\Controllers;

use App\Models\mh_record;
use Illuminate\Http\Request;

class mh_controller extends Controller
{
    //
    public function index()
    {
        $mhrs = mh_record::all();
        return view('backend.manhours.list_manhours', ['mhrs'=>$mhrs]);
    }
    public function create()
    {
        return view('backend.manhours.create_manhours');
    }
    public function store(Request $request)
    {
        $request->validate(['project' => 'required','client'=>'required','period'=>'required','location'=>'required','total_h'=>'required']);
        $mh_list = new mh_record;
        $mh_list->project = $request->project;
        $mh_list->client = $request->client;
        $mh_list->period = $request->period;
        $mh_list->location = $request->location;
        $mh_list->total = $request->total_h;

        $mh_list->save();
        return redirect()->route('backend.manhours.index')->with('success', 'เพิ่มสถิติ ' . $request->project . ' สำเร็จ!');

    }
    public function edit($id)
    {
        $mhrs = mh_record::find($id);
        return view('backend.manhours.edit_manhours', ['editmhrs'=>$mhrs]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(['project' => 'required','client'=>'required','period'=>'required','location'=>'required','total_h'=>'required']);

        $mhrs = mh_record::find($id);
        $mhrs->project = $request->project;
        $mhrs->client = $request->client;
        $mhrs->period = $request->period;
        $mhrs->location = $request->location;
        $mhrs->total = $request->total_h;
        $mhrs->save();

        return redirect()->route('backend.manhours.index')->with('success', 'แก้ไขสถิติ ID ที่ ' . $mhrs->id . ' สำเร็จ!');

    }
    public function destroy($id)
    {
        $mhrs = mh_record::findOrFail($id);
        $mhrsname = $mhrs->project;

        if ($mhrs->delete()) {
            return redirect()->route('backend.manhours.index')->with('success', 'สถิติ ' . $mhrsname . ' ถูกลบเรียบร้อยแล้ว.');
        } else {
            return redirect()->route('backend.manhours.index')->with('failed', 'สถิติ ' . $mhrsname . ' ไม่สามารถลบได้');
        }
    }
}
