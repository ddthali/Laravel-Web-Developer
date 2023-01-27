<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMG - Resources</title>
    <!-- Fonts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Manrope&family=Mitr:wght@300&family=Rubik&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v15.0"
        nonce="o4n9F8ar"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @vite(['resources/js/app.js'])
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
        <symbol id="facebook" viewBox="0 0 16 16">
            <path
                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
        </symbol>
        <symbol id="instagram" viewBox="0 0 16 16">
            <path
                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
        </symbol>
        <symbol id="twitter" viewBox="0 0 16 16">
            <path
                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
        </symbol>
    </svg>
    @component('components.navbar')
    @endcomponent
    @component('components.preloader')
    @endcomponent
    <!-- your content goes here -->
    <div class="special" style="background-color: #B0C7DF;margin: 0;">
        <div id="cover-image3">

        </div>
        <div class="container-fluid p-0 mt-5 text-center" style="">
            <div class="row gx-0 mb-5">
                <div class="col-lg-4 ">
                    <div id="VenderBN" class="VisionBN container rounded-3 mt-4 mb-3 mx-0 mx-auto" style="padding: 2.43rem;">
                        <h4 style="font-weight: 800" class="text-center">VENDOR-LIST</h4>
                        <h5 style="font-weight: 700" class="text-center">Material</h5>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานวัสดุก่อสร้าง – เหล็ก</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v1 as $V_1)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_1->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานสี</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v2 as $V_2)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_2->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานวัสดุก่อสร้าง – คอนกรีต</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v3 as $V_3)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_3->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานหลังคา</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v4 as $V_4)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_4->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานวัสดุก่อสร้าง – ดิน</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v5 as $V_5)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_5->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานท่อ, น๊อต</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v6 as $V_6)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_6->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานเหล็กรางน้ำ เกรตติ้ง</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v7 as $V_7)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_7->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานประตูหน้าต่าง</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v8 as $V_8)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_8->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h5 style="font-weight: 700" class="text-center mt-4">Service & Rentals</h5>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานบริการออกแบบสถาปัตย์</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v9 as $V_9)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_9->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานเทส สี เหล็ก เชื่อม</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v10 as $V_10)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_10->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานบริการนั่งร้าน</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v11 as $V_11)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_11->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานไฟฟ้า</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v12 as $V_12)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_12->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานท่อ</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v13 as $V_13)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_13->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                        <h6 style="font-weight: 600;font-family: 'Mitr',sans-serif;">งานเช่าเครื่องมือ เครื่องจักร</h6>
                        <ul style="list-style-type: '\1F3ED&nbsp&nbsp';">
                            <div class="corp-list">
                            @foreach($v14 as $V_14)
                            <li class="mb-2" style="font-family: 'Mitr',sans-serif;">{{ $V_14->v_client }}</li>
                            @endforeach
                            </div>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div id="aboutcmg" class="Content-dark container  p-4 mt-4 mb-5 rounded-3">
                                <div class="ribbwork1" align="center">
                                    <div class="ribbwork2">
                                    CMG's Head Office
                                    </div>
                                </div>
                                <br>
                                <img src="storage/officemap.jpg" class="img-fluid mb-3 img-view cv-anim" style="border-radius: 6px;">
                                <div class="ribbwork1" align="center" style="height: 68px;">
                                    <div class="ribbwork2" style="font-size: 18px; height: 68px; line-height: 32px;">
                                    CMG's Head Office : <br>Location
                                    </div>
                                </div>
                                <br>
                                        <iframe class="mb-3 map-responsive" style="border-radius: 6px;"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d84340.42838751564!2d101.20118685232039!3d12.68862359196518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102fb91ce3f5501%3A0x30fb215432cf5b81!2sCMG%20Engineering%20%26%20Construction%20Co.%2CLtd.!5e0!3m2!1sen!2sth!4v1671783962501!5m2!1sen!2sth"
                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        <div class="Content-light text-center mb-3" style="border-radius: 6px; padding: 12px;">
                                            <span class="topic-b">CMG's Head Office Address</span><br>
                                            &nbsp;4/281 MOO.3 TAMBOL NERNPRA,AMPHUR MUANG ,RAYONG PROVINCE 21000<br>
                                            <span class="topic-b">Hours</span><br>
                                            <span class="topic-b">Monday - Friday :</span>&nbsp;8:00 - 17:00<br>
                                            <span class="topic-b">Saturday :</span>&nbsp;8:00 - 17:00<br>
                                            <span class="topic-b">Sunday :</span>&nbsp;Close<br>
                                        </div>

                                        <div class="ribbwork1" align="center">
                                            <div class="ribbwork2">
                                            CMG Workshop
                                            </div>
                                        </div>

                                            <br>
                                        <img src="storage/wsmap.png" class="img-fluid mb-5 img-view cv-anim" style="border-radius: 6px;">
                                        <div class="ribbwork1" align="center" style="height: 68px;">
                                            <div class="ribbwork2" style="font-size: 18px; height: 68px; line-height: 32px;">
                                             CMG Workshop : <br>Location
                                            </div>
                                        </div>
                                        <br>
                                        <iframe class="mb-3 map-responsive" style="border-radius: 6px;"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248987.4523396138!2d101.1055459018639!3d12.815535309877644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102fa6dcec5b94f%3A0xdd02f5c62a24168a!2sCMG&#39;s%20Work%20Shop!5e0!3m2!1sen!2sth!4v1671786891362!5m2!1sen!2sth"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        <div class="Content-light text-center mb-1" style="border-radius: 6px; padding: 12px;">
                                            <span class="topic-b">CMG Workshop Address</span><br>
                                            &nbsp;M5QG+75 Rayong, Mueang Rayong District, Rayong<br>
                                            <span class="topic-b">Hours</span><br>
                                            <span class="topic-b">Monday - Friday :</span>&nbsp;8:00 - 17:00<br>
                                            <span class="topic-b">Saturday :</span>&nbsp;8:00 - 17:00<br>
                                            <span class="topic-b">Sunday :</span>&nbsp;Close<br>
                                        </div>
                                        <div class="text-start mb-5">
                                            <table class="table table-borderless custom-hover">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="6">
                                                            <p class="text-center" style="font-weight: 600;">The number
                                                                peaked at 300. From the past to the present, CMG has all
                                                                of the following staff and employees.</p>
                                                        </td>
                                                    </tr>
                                                    @foreach ($Employee as $emp)
                                                        <tr>
                                                            <td></td>
                                                            <td>• {{ $emp->name }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{ $emp->total }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <h5 class="mb-4" style="font-weight: 600;">Equipment</h5>

                                        <!-- Row-1 -->
                                        <div class="row gx-0">
                                            @php
                                                $column = 0;
                                            @endphp
                                            @foreach ($Equip as $Equipments)
                                                @php
                                                    $column++;
                                                @endphp
                                                <div class="col-md-6">
                                                    <div class="box">
                                                        <div class="left">
                                                        </div>
                                                        <div class="right">
                                                            <div style="display: flex; align-items: center;">
                                                                <ion-icon name="hammer-outline"></ion-icon>
                                                                &nbsp;{{ $Equipments->s_name }}
                                                            </div>
                                                        </div>
                                                        <div class="right2">
                                                            {{ $Equipments->s_total }} ea.
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($column % 2 == 0)
                                        </div>
                                        <div class="row gx-0">
                                            @endif
                                            @endforeach
                                            <!-- Row-1-end -->
                                            <h5 class="mb-4 mt-5" style="font-weight: 600;">Tools</h5>
                                            @php
                                                $column = 0;
                                            @endphp
                                            <div class="row gx-0">
                                                @foreach ($Tools as $Tool)
                                                    @php
                                                        $column++;
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="box">
                                                            <div class="left">
                                                            </div>
                                                            <div class="right">
                                                                <div style="display: flex; align-items: center;">
                                                                    <ion-icon name="hammer-outline"></ion-icon>
                                                                    &nbsp;{{ $Tool->s_name }}
                                                                </div>
                                                            </div>
                                                            <div class="right2">{{ $Tool->s_total }} ea.</div>
                                                        </div>
                                                    </div>
                                                    @if ($column % 2 == 0)
                                            </div>
                                            <div class="row gx-0">
                                                @endif
                                                @endforeach

                                            </div>
                                        </div>
                    </div>
                </div>
                @component('components.full-screen-image')
                @endcomponent
                <!-- end-content -->
                @component('components.footer')
                @endcomponent
                @component('components.to-top')
                @endcomponent
                <script src="{{ asset('/js/normal.js') }}"></script>
</body>

</html>
