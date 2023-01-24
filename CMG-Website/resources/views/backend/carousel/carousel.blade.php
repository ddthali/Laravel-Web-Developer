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
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Manrope&family=Mitr:wght@300&family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Backend - Carousel</title>
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
<script>
    const Success = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
const Failed = Swal.mixin({
  toast: true,
  position: 'top',
  showCloseButton: true,
  showConfirmButton: false,
})
const FixedData = [];
</script>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 style="font-family: 'Mitr',sans-serif;">รูปภาพสไลด์ในหน้าแรก</h2>
            </div>
            <div>
                <a href="{{ route('backend.carousel.create') }}" class="btn btn-success"><span class="font-thai">เพิ่ม</span></a>
            </div>
            @if ($success = Session::get('success'))
            <script>
            Success.fire({
                icon: 'success',
                title: '{{ $success }}'
              })
              </script>
            @elseif ($failed = Session::get('failed'))
            <script>
                Failed.fire({
                    icon: 'error',
                    title: '{{ $failed }}'
                  })
                  </script>
            @endif
            <table class="table table-bordered" id="mytable">
                <thead class="table-success">
                <tr>
                    <th class="font-thai">สไลด์ที่</th>
                    <th class="font-thai">ตัวอย่างรูป</th>
                    <th class="font-thai">ที่อยู่ของรูป</th>
                    <th class="font-thai">จัดการ</th>
                </tr>
                </thead>
                <tbody class="table-primary">
                @foreach ($carousel as $slides)
                    <tr id="{{ $slides->id }}" class="slide-{{ $slides->id }}">
                        <input type="hidden" id="{{$slides->id}}" value="{{$slides->id}}">
                        <td class="sq_order">{{ $slides->sq_order }}</td>
                        <td><img src="{{  asset('storage/'.$slides->path_img) }}" alt="" width="300" height="200"></td>
                        <td>storage/app/public/{{ $slides->path_img }}</td>
                        <td>
                            <form id="delete-form-{{ $slides->id }}" action="{{ route('backend.carousel.destroy', $slides->id) }}" method="post">
                                <a href="{{ route('backend.carousel.edit', $slides->id) }}" class="btn btn-warning"><span class="font-thai">แก้ไข</span></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="deleteRecord({{ $slides->id }})"><span class="font-thai">ลบ</span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $carousel->links('pagination::bootstrap-5') }}
        </div>
        <a role="button" class="btn btn-danger" href="{{ url('/logout') }}">Logout</a>
    </div>
<script>
    function deleteRecord(id) {
  const ids = document.querySelector(`.slide-${id}`);
  let sqorder = ids.querySelector('.sq_order').innerText;
  Swal.fire({
    title: 'คุณแน่ใจว่าจะลบสไลด์นี้หรือไม่?',
    text: `สไลด์นี้ '${sqorder}' จะหายไปเมื่อคุณลบ!`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'ใช่, ลบเลย!',
    cancelButtonText: 'ไม่, ยังก่อน'
  }).then((result) => {
    if (result.value) {
      // Submit the form to delete the record
      document.getElementById(`delete-form-${id}`).submit();
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: 'ยกเลิกการลบ',
        text: 'สไลด์นี้จะไม่ถูกลบ',
        icon: 'error',
        confirmButtonText: 'ตกลง'
      })
    }
  })
}
function updateServer(){
    let newOrder = $("#mytable tbody").sortable("toArray");
    axios.post('/update-order', {
        newOrder: newOrder,
        FixedData: FixedData
    })
    .then(function (response) {
        let order = response.data.NumOrder;
        let table = document.getElementById("mytable");
        for (let i = 0; i < order.length; i++) {
            let row = table.rows[i + 1];
            let td = row.cells[0];
            td.innerText = order[i];
        }
    })
    .catch(function (error) {
        console.log(error);
    });
}
$(document).ready(()=>{
    const rows = document.querySelector('tbody');
    const nrows = rows.querySelectorAll('tr .sq_order');
    for(let xd of nrows) {
        FixedData.push(xd.innerText);
    }
    $("#mytable tbody").sortable({
        update: function(event, ui) {
            updateServer();
        }
    });
})
</script>
</body>
</html>
