@extends('Admin.layouts.main')
@section('content')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <h4 class="font-weight-bolder mb-0">Books</h4>
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
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <div class="row">
                                <div class="col-10">
                                    <h6 class="text-white text-capitalize ps-3">Books</h6>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-success my-0 py-2" data-bs-toggle="modal"
                                        data-bs-target="#add">
                                        <i class="fa fa-book" aria-hidden="true"></i> ADD BOOK
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
                                            Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Publisher</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Author
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Category</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Release Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold py-1 mb-0">{{ $book->book_title }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $book->publisher }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $book->author }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $book->categoryName }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h5 class="text-xs font-weight-bold mb-0">{{ $book->release_date }}</h5>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#edit-{{ $book->book_id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="modal fade" id="edit-{{ $book->book_id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">Book Edit</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form class="user" action="{{ route('book.update') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label>ISBN</label>
                                                                        <input type="text" name="book_id"
                                                                            class="form-control"
                                                                            value="{{ $book->book_id }}" readonly>
                                                                    </div>
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label>Book Name</label>
                                                                        <input type="text" name="book_title"
                                                                            class="form-control"
                                                                            value="{{ $book->book_title }}">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div
                                                                                class="input-group input-group-static mb-4">
                                                                                <label>Author</label>
                                                                                <input type="text" name="author"
                                                                                    class="form-control"
                                                                                    value="{{ $book->author }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div
                                                                                class="input-group input-group-static mb-4">
                                                                                <label>Book
                                                                                    Publisher</label>
                                                                                <input type="text" name="publisher"
                                                                                    class="form-control"
                                                                                    value="{{ $book->publisher }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div
                                                                                class="input-group input-group-static mb-4">
                                                                                <label>Release
                                                                                    Date</label>
                                                                                <input type="date" name="release_date"
                                                                                    class="form-control"
                                                                                    value="{{ $book->release_date }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div
                                                                                class="input-group input-group-static mb-4">
                                                                                <label>Number of
                                                                                    Pages</label>
                                                                                <input type="number" name="page"
                                                                                    class="form-control"
                                                                                    value="{{ $book->page }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label for="category"
                                                                            class="ms-0">Category</label>
                                                                        <select class="form-control" id="category"
                                                                            name="categoryName"
                                                                            value="{{ $book->categoryName }}">
                                                                            @foreach ($categories as $category)
                                                                                <option
                                                                                    value='{{ $category->categoryName }}'>
                                                                                    {{ $category->categoryName }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label>Synopsis</label>
                                                                        <textarea name="synopsis" class="form-control" id="">{{ $book->synopsis }}</textarea>
                                                                    </div>
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label>Cover</label>
                                                                        <input type="file" name="cover"
                                                                            class="form-control"
                                                                            value="{{ $book->cover }}">
                                                                    </div>
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label>PDF</label>
                                                                        <input type="file" name="pdf"
                                                                            class="form-control"
                                                                            value="{{ $book->pdf }}">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-info"
                                                                        name="submit">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deletedbook-{{ $book->book_id }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <div class="modal fade" id="deletedbook-{{ $book->book_id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="delete"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="delete">Confirm</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Are you sure you want to delete this book?</h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">NO</button>
                                                                <a
                                                                    class="btn btn-danger"href="{{ route('book.delete', $book->book_id) }}">YES</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-inline-flex">
                        {!! $books->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add">ADD BOOK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="user" action="{{ route('book.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group input-group-static mb-4">
                            <label>ISBN</label>
                            <input type="text" name="book_id" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Book Name</label>
                            <input type="text" name="book_title" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Author</label>
                                    <input type="text" name="author" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Book
                                        Publisher</label>
                                    <input type="text" name="publisher" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Release
                                        Date</label>
                                    <input type="date" name="release_date" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Number of
                                        Pages</label>
                                    <input type="number" name="page" class="form-control" value="page">
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="category" class="ms-0">Category</label>
                            <select class="form-control" id="category" name="categoryName">
                                @foreach ($categories as $category)
                                    <option value='{{ $category->categoryName }}'>
                                        {{ $category->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group input-group-static mb-4">
                            <label>Synopsis</label>
                            <textarea name="synopsis" class="form-control" id=""></textarea>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Cover</label>
                            <input type="file" name="cover" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>PDF</label>
                            <input type="file" name="pdf" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info" name="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
