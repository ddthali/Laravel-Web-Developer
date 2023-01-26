<?php

use App\Http\Controllers\EmployEE_controller;
use App\Http\Controllers\mh_controller;
use App\Http\Controllers\supply_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackN;
use App\Http\Controllers\Gallery;
use App\Http\Controllers\category_controller;
use App\Http\Controllers\subcate_controller;
use App\Http\Controllers\vendor_controller;

Route::middleware(['auth'])->group(function () {
Route::resources([
    'backend/carousel' => BackN::class,
    'backend/gallery' => Gallery::class,
    'backend/subcategory' => subcate_controller::class,
    'backend/category' => category_controller::class,
    'backend/manhours' => mh_controller::class,
    'backend/supply' => supply_controller::class,
    'backend/employee' => EmployEE_controller::class,
    'backend/vendor' => vendor_controller::class,
],['as'=>'backend']);

Route::get('backend', fn()=>view('backend.index'))->name('backend.index');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
// Route::get('/backend/carousel', '\App\Http\Controllers\BackN@index')->name('backend.carousel.index');
// Route::get('/backend/carousel/create', '\App\Http\Controllers\BackN@create')->name('backend.carousel.create');
Route::post('/update-order', [BackN::class, 'updateOrder']);
Route::get('/welcome', fn() => view('welcome'));
//ทำการ Routing Page เข้าไว้ด้วยกัน โดยกำหนด name ด้วย ซึ่งจะสามารถนำไปใช้ ใน Link ผ่าน route(); ได้ด้วย
Route::get('/', fn() => view('index',['slides' => App\Models\carousel::getAll()]))->name('index');
Route::get('/corporate', fn() => view('corporate'))->name('corporate');
Route::get('/documentation', fn() => view('documentation'))->name('documentation');
Route::get('/portfolio', fn() => view('portfolio',
    [
        'workexp' => App\Models\portfolio::getAll(),
        'workimg' => App\Models\gallerymodeler::show_record(1,null)
    ]
)
)->name('portfolio');
//Routing ตัวนี้มีการส่งค่าพารามิเตอร์ด้วย โดยใช้ Models
Route::get('/safety', function () {
    $mh_records = App\Models\mh_record::getAllRecords();
    $s_img = App\Models\gallerymodeler::all();
    return view('safety', ['mh_records' => $mh_records, 's_img' => $s_img]);
})->name('safety');
Route::get('/resources', function () {
    $employee = App\Models\EmployEE::getAllRecords();
    $equip = App\Models\Supply::SupplyGroup('s_type', 'equipment');
    $tools = App\Models\Supply::SupplyGroup('s_type', 'tools');
    $v1 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานวัสดุก่อสร้าง – เหล็ก');
    $v2 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานสี');
    $v3 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานวัสดุก่อสร้าง – คอนกรีต');
    $v4 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานหลังคา');
    $v5 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานวัสดุก่อสร้าง – ดิน');
    $v6 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานท่อ, น๊อต');
    $v7 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานเหล็กรางน้ำ เกรตติ้ง');
    $v8 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'MATERIAL', 'งานประตูหน้าต่าง');
    $v9 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'SERVICE & RENTALS', 'งานบริการออกแบบสถาปัตย์');
    $v10 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'SERVICE & RENTALS', 'งานเทส สี เหล็ก เชื่อม');
    $v11 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'SERVICE & RENTALS', 'งานบริการนั่งร้าน');
    $v12 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'SERVICE & RENTALS', 'งานไฟฟ้า');
    $v13 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'SERVICE & RENTALS', 'งานท่อ');
    $v14 = App\Models\vendor::getVendorBySub('v_main', 'v_sub', 'SERVICE & RENTALS', 'งานเช่าเครื่องมือ เครื่องจักร');
    return view('resources',
    ['Employee' => $employee,
    'Equip' => $equip,
    'Tools' => $tools,
    'v1'=>$v1,
    'v2'=>$v2,
    'v3'=>$v3,
    'v4'=>$v4,
    'v5'=>$v5,
    'v6'=>$v6,
    'v7'=>$v7,
    'v8'=>$v8,
    'v9'=>$v9,
    'v10'=>$v10,
    'v11'=>$v11,
    'v12'=>$v12,
    'v13'=>$v13,
    'v14'=>$v14]);
})->name('resources');

Auth::routes();

Route::get('/welcome', fn()=> view('welcome'));
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
