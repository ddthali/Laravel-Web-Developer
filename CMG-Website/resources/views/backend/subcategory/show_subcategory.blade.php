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
    <title>Backend - SubCategory</title>
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
                <h2 style="font-family: 'Mitr',sans-serif;">หมวดหมู่รองทั้งหมด</h2>
            </div>
            <div>
                <a href="{{ route('backend.subcategory.create') }}" class="btn btn-success">Create</a>
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
            <table id="subcate" class="table table-bordered">
                <thead>
                    <tr>
                        <td class="font-thai">ID</td>
                        <td class="font-thai">ชื่อหมวดหมู่</td>
                        <td class="font-thai">จัดการ</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subc as $subcate)
                    <tr>
                        <td class="font-thai">{{ $subcate->sub_cate }}</td>
                        <td class="font-thai">{{ $subcate->name }}</td>
                        <td class="font-thai">
                            <form id="delete-form-{{ $subcate->sc_id }}" action="{{ route('backend.subcategory.destroy', $subcate->sc_id) }}" method="post">
                                <a href="{{ route('backend.subcategory.edit', $subcate->sc_id) }}" class="btn btn-warning"><span class="font-thai">แก้ไข</span></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="deleteRecord({{ $subcate->sc_id }},'{{ $subcate->name }}')"><span class="font-thai">ลบ</span></button>
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
        title: 'คุณแน่ใจว่าจะลบหมวดหมู่นี้หรือไม่?',
        text: `หมวดหมู่นี้ '${cname}' จะหายไปเมื่อคุณลบ!`,
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
            text: 'หมวดหมู่นี้จะไม่ถูกลบ',
            icon: 'error',
            confirmButtonText: 'ตกลง'
          })
        }
      })
    }
    $(document).ready(function () {
        $('#subcate').DataTable();
    });
    </script>
</body>
</html>
