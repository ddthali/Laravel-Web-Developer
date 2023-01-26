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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/r-2.4.0/sp-2.1.0/datatables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/r-2.4.0/sp-2.1.0/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Backend - Manhours</title>
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
@component('components.sidenav_backend')
@endcomponent
</head>
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
</script>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 style="font-family: 'Mitr',sans-serif;">รวมสถิติ Manhour</h2>
            </div>
            <div class="mb-2">
                <a href="{{ route('backend.manhours.create') }}" class="btn btn-success"><span class="font-thai">เพิ่ม</span></a>
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
            <table id="manhours" class="table table-bordered">
                <thead>
                    <tr>
                        <td class="font-thai">ID (ลำดับ)</td>
                        <td class="font-thai">ชื่อโปรเจค</td>
                        <td class="font-thai">ลูกค้า</td>
                        <td class="font-thai">ระยะเวลา</td>
                        <td class="font-thai">สถานที่</td>
                        <td class="font-thai">รวม</td>
                        <td class="font-thai">จัดการ</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mhrs as $manhours)
                    <tr>
                        <td class="font-thai">{{ $manhours->id }}</td>
                        <td class="font-thai">{{ $manhours->project }}</td>
                        <td class="font-thai">{{ $manhours->client }}</td>
                        <td class="font-thai">{{ $manhours->period }}</td>
                        <td class="font-thai">{{ $manhours->location }}</td>
                        <td class="font-thai">{{ $manhours->total }} ชั่วโมง</td>
                        <td class="font-thai">
                            <form id="delete-form-{{ $manhours->id }}" action="{{ route('backend.manhours.destroy', $manhours->id) }}" method="post">
                                <a href="{{ route('backend.manhours.edit', $manhours->id) }}" class="btn btn-warning"><span class="font-thai">แก้ไข</span></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="deleteRecord({{ $manhours->id }},'{{ $manhours->project }}')"><span class="font-thai">ลบ</span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteRecord(id,cname) {
      Swal.fire({
        title: 'คุณแน่ใจว่าจะลบสถิตินี้หรือไม่?',
        text: `สถิตินี้ '${cname}' จะหายไปเมื่อคุณลบ!`,
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
            text: 'สถิตินี้จะไม่ถูกลบ',
            icon: 'error',
            confirmButtonText: 'ตกลง'
          })
        }
      })
    }
    $(document).ready(function () {
        $('#manhours').DataTable();
    });
    </script>
</body>
</html>
