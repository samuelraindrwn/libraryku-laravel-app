@extends('Admin.layouts.main')

@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <h4 class="font-weight-bolder mb-0">Profile</h4>
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
                </script>
            </h5>
        </div>
    </nav>
    @include('Admin.partials.flash')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Profile Settings</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form action="{{ route('updateProfile') }}" role="form" class="text-start" method="post">
                                @csrf
                                <input type="hidden" name="role" value="admin">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-static my-3">
                                            <label>Firstname</label>
                                            <input type="text" name="firstname" class="form-control"
                                                value="{{ $user->firstname }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-static my-3">
                                            <label>Lastname</label>
                                            <input type="text" name="lastname"
                                                class="form-control"value="{{ $user->lastname }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group input-group-static my-3">
                                    <label>Birth Of Date</label>
                                    <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                </div>
                                <div class="input-group input-group-static my-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                                <div class="input-group input-group-static my-3">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $user->username }}">
                                </div>
                                <button type="submit" name="submit" class="btn btn-info">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Password Settings</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form action="{{ route('changePassword') }}" role="form" class="text-start"
                                    method="post">
                                    @csrf
                                    <div class="input-group input-group-static my-3">
                                        <label>Current Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="input-group input-group-static my-3">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                    <div class="input-group input-group-static mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" name="conf_password" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" name="submit" class="btn btn-info">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('forgot-password') }}" target="_blank">Forgot Password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
