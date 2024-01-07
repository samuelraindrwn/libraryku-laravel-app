@extends('Admin.layouts.main')
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <h4 class="font-weight-bolder mb-0">Dashboard</h4>
            <h5>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                        'November', 'Desember'
                    ];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </h5>
        </div>
    </nav>
    @include('Admin.partials.flash')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Users</p>
                            <h4 class="mb-0">{{ $users }}</h4>
                        </div>
                    </div>
                    <div class="card-footer p-3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Books</p>
                            <h4 class="mb-0">{{ $books }}</h4>
                        </div>
                    </div>
                    <div class="card-footer p-3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Journal</p>
                            <h4 class="mb-0">{{ $articles }}</h4>
                        </div>
                    </div>
                    <div class="card-footer p-3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Reservations</p>
                            <h4 class="mb-0">{{ $reservations }}</h4>
                        </div>
                    </div>
                    <div class="card-footer p-3"></div>
                </div>
            </div>
        </div>
        <div class="row my-4 justify-content-center">
            <div class="col-10 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-body text-center poppins p-5">
                        <h1>
                            Welcome To Admin
                            <span style="color: #4da6e7">Library</span><span style="color: hsl(16, 100%, 68%)">KU</span>!
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
