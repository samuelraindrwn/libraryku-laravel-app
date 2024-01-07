@extends('Admin.layouts.main')

@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <h4 class="font-weight-bolder mb-0">Users</h4>
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
                            <h6 class="text-white text-capitalize ps-3">Teacher</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Birthday
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">{{ $teacher->firstname }}
                                                    {{ $teacher->lastname }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $teacher->email }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $teacher->username }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $teacher->dob }}</h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $teachers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Student</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Birthday
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">{{ $student->firstname }}
                                                    {{ $student->lastname }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $student->email }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $student->username }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $student->dob }}</h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $students->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-danger shadow-danger border-radius-lg pt-4 pb-3">
                            <div class="row">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Admin</h6>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-success my-0 py-2" data-bs-toggle="modal"
                                        data-bs-target="#addAdmin"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                        Add Admin
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Birthday
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">{{ $admin->firstname }}
                                                    {{ $admin->lastname }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $admin->email }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $admin->username }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $admin->dob }}</h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $admins->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="admin" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="admin">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.user') }}" role="form" class="text-start" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="role" value="admin">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Birth Of Date</label>
                            <input type="date" name="dob" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="confpassword" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-info">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
