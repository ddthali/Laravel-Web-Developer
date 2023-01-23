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
    <title>Backend - Add Manhours</title>
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
                <h2 class="font-thai">แก้ไขสถิติ Manhours</h2>
            </div>
            <div>
                <a href="{{ route('backend.manhours.index') }}" class="btn btn-primary"><span class="font-thai">ย้อนกลับ</span></a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif
            <form action="{{ route('backend.manhours.update', $editmhrs->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project" class="font-thai">ชื่อของโปรเจค</label>
                            <br>
                            <input class="form-control" type="text" name="project" id="project" value="{{ $editmhrs->project }}">
                            @error('project')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณากรอกชื่อโปรเจคก่อน!</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="client" class="font-thai">บริษัทลูกค้า</label>
                            <br>
                            <input class="form-control" type="text" name="client" id="client" value="{{ $editmhrs->client }}">
                            @error('client')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณากรอกชื่อบริษัทลูกค้าก่อน!</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="period" class="font-thai">ระยะเวลาโปรเจค</label>
                            <br>
                            <input class="form-control" type="text" name="period" id="period" value="{{ $editmhrs->period }}">
                            @error('period')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณากรอกชื่อระยะเวลาโปรเจคก่อน!</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="location" class="font-thai">สถานที่โปรเจค</label>
                            <br>
                            <input class="form-control" type="text" name="location" id="location" value="{{ $editmhrs->location }}">
                            @error('location')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณากรอกชื่อสถานที่โปรเจคก่อน!</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_h" class="font-thai">ชั่วโมงรวม</label>
                            <br>
                            <input class="form-control" type="text" name="total_h" id="total_h" value="{{ $editmhrs->total }}">
                            @error('total_h')
                            <div class="alert alert-danger">
                            <span class="font-thai">กรุณากรอกชั่วโมงรวมก่อน!</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-primary"><span class="font-thai">แก้ไข</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
