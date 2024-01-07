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
                            <h6 class="text-white text-capitalize ps-3">Indonesia National Library</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation ID</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Book Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Return Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservationsINL as $reservation)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">
                                                    {{ $reservation->reservation_id }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->book_title }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->name }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->reservation_date }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->return_date }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($reservation->status_id == 0)
                                                    <form
                                                        action="{{ route('check.status', $id = $reservation->reservation_id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" name="submit"
                                                            class="btn bg-gradient-info">Done</button>
                                                    </form>
                                                @elseif($reservation->status_id == 1)
                                                    <span class="badge bg-gradient-success">Returned</span>
                                                @elseif($reservation->status_id == 2)
                                                    <span class="badge bg-gradient-danger">Overdue</span>
                                                @endif
                                                </h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $reservationsINL->links() !!}
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
                            <h6 class="text-white text-capitalize ps-3">Bunda Hati Kudus Senior High School Library</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation ID</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Book Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Return Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservationsBHK as $reservation)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">
                                                    {{ $reservation->reservation_id }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->book_title }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->name }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->reservation_date }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->return_date }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($reservation->status_id == 0)
                                                    <form
                                                        action="{{ route('check.status', $id = $reservation->reservation_id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" name="submit"
                                                            class="btn bg-gradient-info">Done</button>
                                                    </form>
                                                @elseif($reservation->status_id == 1)
                                                    <span class="badge bg-gradient-success">Returned</span>
                                                @elseif($reservation->status_id == 2)
                                                    <span class="badge bg-gradient-danger">Overdue</span>
                                                @endif
                                                </h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $reservationsBHK->links() !!}
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
                            <h6 class="text-white text-capitalize ps-3">Mutiara Bangsa Senior High School Library</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation ID</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Book Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Return Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservationsMBS as $reservation)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">
                                                    {{ $reservation->reservation_id }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->book_title }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->name }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->reservation_date }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->return_date }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($reservation->status_id == 0)
                                                    <form
                                                        action="{{ route('check.status', $id = $reservation->reservation_id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" name="submit"
                                                            class="btn bg-gradient-info">Done</button>
                                                    </form>
                                                @elseif($reservation->status_id == 1)
                                                    <span class="badge bg-gradient-success">Returned</span>
                                                @elseif($reservation->status_id == 2)
                                                    <span class="badge bg-gradient-danger">Overdue</span>
                                                @endif
                                                </h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $reservationsMBS->links() !!}
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
                            <h6 class="text-white text-capitalize ps-3">Tarsisius Viereta Senior High School
                                Library</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation ID</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Book Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reservation Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Return Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservationsTVS as $reservation)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">
                                                    {{ $reservation->reservation_id }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->book_title }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->name }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">
                                                    {{ $reservation->reservation_date }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $reservation->return_date }}
                                                </h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($reservation->status_id == 0)
                                                    <form
                                                        action="{{ route('check.status', $id = $reservation->reservation_id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" name="submit"
                                                            class="btn bg-gradient-info">Done</button>
                                                    </form>
                                                @elseif($reservation->status_id == 1)
                                                    <span class="badge bg-gradient-success">Returned</span>
                                                @elseif($reservation->status_id == 2)
                                                    <span class="badge bg-gradient-danger">Overdue</span>
                                                @endif
                                                </h5>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $reservationsTVS->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
