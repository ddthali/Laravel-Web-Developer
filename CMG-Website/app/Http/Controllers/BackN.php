<?php

namespace App\Http\Controllers;

use App\Models\carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackN extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Create
    public function index()
    {
        $data['carousel'] = carousel::orderBy('sq_order','asc')->paginate(10);
        return view('backend.carousel.carousel', $data);
    }

    public function create()
    {
        $lastsq['lastest'] = carousel::orderBy('sq_order', 'desc')->first();

        return view('backend.carousel.create_slide',$lastsq);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $request->file('image')->storeAs('public/carousel', $request->file('image')->getClientOriginalName());

        $lastsq = carousel::getLatest();

        $slide = new carousel;
        $slide->path_img = 'carousel/'.$request->file('image')->getClientOriginalName();
        $slide->sq_order = $lastsq->sq_order + 1;
        $slide->save();

        return redirect()->route('backend.carousel.index')->with('success', 'เพิ่มสไลด์ในหน้าแรกสำเร็จ!');
    }

    public function edit(carousel $carousel)
    {
        return view('backend.carousel.edit_slide', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg']);

        $slide = carousel::find($id);
        if (Storage::exists('public/' . $slide->path_img))
        {
            Storage::delete('public/' . $slide->path_img);
        }
        $request->file('image')->storeAs('public/carousel', $request->file('image')->getClientOriginalName());
        $slide->path_img = 'carousel/'.$request->file('image')->getClientOriginalName();
        $slide->save();

        return redirect()->route('backend.carousel.index')->with('success', 'อัพเดทสไลด์ที่ '.$slide->sq_order.' สำเร็จ!');
    }

    public function destroy(carousel $carousel)
    {
        if (Storage::exists('public/' . $carousel->path_img))
        {
            Storage::delete('public/' . $carousel->path_img);
            $deleted_id = $carousel->sq_order;
            $carousel->delete();
            $rows = carousel::where('sq_order','>',$deleted_id)->get();
            foreach ($rows as $row) {
                $row->sq_order = $row->sq_order - 1;
                $row->save();
            }

            return redirect()->route('backend.carousel.index')->with('success', 'สไลด์ที่ ' . $carousel->sq_order. ' ถูกลบเรียบร้อยแล้ว');
        } else {
            if(str_contains($carousel->path_img,'carousel/'))
            {
                $dirs = substr($carousel->path_img,9);
            } else {
                $dirs = $carousel->path_img;
            }
            return redirect()->route('backend.carousel.index')->with('failed', 'รูปภาพในสไลด์ที่ ' . $carousel->id. " ไม่สามารถลบได้เนื่องจากไฟล์อาจไม่มีอยู่หรือไฟล์ไม่ถูกต้อง. หากต้องการลบกรุณาไปลบที่ฐานข้อมูลหรืออัพไฟล์ ".$dirs." ลงในที่อยู่ของรูปก่อนแล้วค่อยลบรูปนี้");
        }
    }
    public function updateOrder(Request $request)
    {
        $newOrder = $request->newOrder;
        $rows = $request->FixedData;
        for ($i=0; $i <count($newOrder) ; $i++) {
            $list =  $rows[$i];
            $row = carousel::where('id', $newOrder[$i])->first();
            $row->sq_order = $list;
            $row->save();
        }
        return response()->json(['message' => 'Data updated successfully','NumOrder'=>$rows]);
    }
}
