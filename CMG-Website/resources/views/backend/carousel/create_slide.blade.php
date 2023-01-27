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
    <title>Backend - Add Slide</title>
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
            <div class="col-lg-12">
                <h2 class="font-thai">เพิ่มสไลด์ใหม่</h2>
            </div>
            <div>
                <a href="{{ route('backend.carousel.index') }}" class="btn btn-primary"><span class="font-thai">ย้อนกลับ</span></a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif
            <form action="{{ route('backend.carousel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-thai">สไลด์ที่ {{ is_null($lastest) ? '1' : $lastest->sq_order+1 }}</label>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="image">
                            @error('image')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณาเลือกไฟล์ก่อน!</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><span class="font-thai">เพิ่ม</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
