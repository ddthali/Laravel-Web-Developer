<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Manrope&family=Mitr:wght@300&family=Rubik&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Backend - Edit Vendor</title>
    @vite(['resources/js/app.js'])
    <style>
        .font-thai{
            font-family: 'Mitr',sans-serif;
        }
        .swal2-title{
            font-family: 'Mitr',sans-serif!important;
        }
        .swal2-content{
            font-family: 'Mitr',sans-serif!important;
        }
        .swal2-styled{
            font-family: 'Mitr',sans-serif!important;
        }
    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12" >
                <h2 class="font-thai">แก้ไขบริษัทผู้จำหน่าย</h2>
            </div>
            <div>
                <a href="{{ route('backend.vendor.index') }}" class="btn btn-primary"><span class="font-thai">ย้อนกลับ</span></a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif
            <form action="{{ route('backend.vendor.update', $vendor->v_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="corpname" class="font-thai">ชื่อของบริษัทที่จะเพิ่ม</label>
                            <br>
                            <input type="text" name="corpname" id="corpname" value="{{ $vendor->v_client }}">
                            @error('corpname')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณากรอกชื่อบริษัทก่อน!</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="maintype" class="font-thai">เลือกหมวดหมู่หลัก</label>
                            <br>
                            <select class="form-select" id="maintype" name="maintype">
                                <option value="MATERIAL" {{ $vendor->v_main == 'MATERIAL' ? 'selected' : '' }}>MATERIAL</option>
                                <option value="SERVICE & RENTALS" {{ $vendor->v_main == 'SERVICE & RENTALS' ? 'selected' : '' }}>SERVICE & RENTALS</option>
                            </select>
                            @error('maintype')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณาเลือกหมวดหมู่หลักก่อน!</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <label class="font-thai">เลือกหมวดหมู่รอง (ติ๊กได้หลายช่อง)</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานเช่าเครื่องมือ เครื่องจักร" {{ str_contains($vendor->v_sub,'งานเช่าเครื่องมือ เครื่องจักร') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai" >งานเช่าเครื่องมือ เครื่องจักร</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานสี" {{ str_contains($vendor->v_sub,'งานสี') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานสี</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานท่อ" {{ str_contains($vendor->v_sub,'งานท่อ') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานท่อ</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานท่อ, น็อต" {{ str_contains($vendor->v_sub,'งานท่อ, น็อต') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานท่อ, น๊อต</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานบริการนั่งร้าน" {{ str_contains($vendor->v_sub,'งานบริการนั่งร้าน') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานบริการนั่งร้าน</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานบริการออกแบบสถาปัตย์" {{ str_contains($vendor->v_sub,'งานบริการออกแบบสถาปัตย์') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานบริการออกแบบสถาปัตย์</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานประตูหน้าต่าง" {{ str_contains($vendor->v_sub,'งานประตูหน้าต่าง') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานประตูหน้าต่าง</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานวัสดุก่อสร้าง - คอนกรีต" {{ str_contains($vendor->v_sub,'งานวัสดุก่อสร้าง - คอนกรีต') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานวัสดุก่อสร้าง - คอนกรีต</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานวัสดุก่อสร้าง - ดิน" {{ str_contains($vendor->v_sub,'งานวัสดุก่อสร้าง - ดิน') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานวัสดุก่อสร้าง - ดิน</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานวัสดุก่อสร้าง - เหล็ก" {{ str_contains($vendor->v_sub,'งานวัสดุก่อสร้าง - เหล็ก') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานวัสดุก่อสร้าง - เหล็ก</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานหลังคา" {{ str_contains($vendor->v_sub,'งานหลังคา') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานหลังคา</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานเทส สี เหล็ก เชื่อม" {{ str_contains($vendor->v_sub,'งานเทส สี เหล็ก เชื่อม') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานเทส สี เหล็ก เชื่อม</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานเหล็กรางน้ำ เกรตติ้ง" {{ str_contains($vendor->v_sub,'งานเหล็กรางน้ำ เกรตติ้ง') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานเหล็กรางน้ำ เกรตติ้ง</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="checkBox[]" value="งานไฟฟ้า" {{ str_contains($vendor->v_sub,'งานไฟฟ้า') ? 'checked' : '' }}>
                                <label class="form-check-label font-thai">งานไฟฟ้า</label>
                              </div>
                            @error('checkBox')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณาเลือกหมวดหมู่รองอย่างน้อย 1 อย่าง!</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-primary"><span class="font-thai">ยืนยัน</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
