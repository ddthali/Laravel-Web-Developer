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
    <title>Backend - Monitoring Computer</title>
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
            body {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            height: 100%;
            background-image: url("http://workshop2022.ddns.net/Network-BG.jpg");
        }
        .static .notify {
	font-size: 13px;
	display: inline-block;
	border-radius: 20px;
	position: absolute;
	right: 16px;
	top: 12px;
}
        .static .cname {
	font-size: 20px;
	font-weight: bold;
	display: inline-block;
	position: absolute;
	top: 30%;
  	left: 50%;
  	transform: translate(-50%, -50%);
	white-space: nowrap;
}
</style>
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
    <div class="container bg-secondary rounded-4 p-5 mt-4 shadow-lg">
    <div id="app">
        <h1 class="text-center" style="color: white;">Central Monitoring Computer</h1>
        <br>
        <h3>All Computer Online : <span style="color: lime;">[[ nowon ]]</span>/[[ all ]]</h3>
        <div class="row g-0">
            <div class="col-sm-2" v-for="dv in computer">
        <div :class="[dv.Status=='0' ? mask : unmask]" style="width: 10rem;">
        <img v-if="dv.Status == '1'" title="Test" class="notify shadow" :src="onLine" style="width: 40px;height: 20px;">
        <img v-else title="Test" class="notify shadow" :src="offLine" style="width: 40px;height: 20px;">
	<div class="cname">[[ dv.Name ]]</div>
  <img src="Computer.png" class="card-img-top" alt="...">
<div class="card-body">
<h6>JOB : [[dv.JOB]]</h6>
</div>
</div>
            </div>
        </div>
</div>
    </div>
</body>
</html>
