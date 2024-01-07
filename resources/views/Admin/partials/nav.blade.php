<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            <h2 class="ms-1 font-weight-bold text-center text-white"><span style="color: #4da6e7">Library</span><span
                    style="color: hsl(16, 100%, 68%)">KU</span></h2>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2" />
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark {{ url()->current() === url('admin/dashboard') ? 'active bg-gradient-info' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ url()->current() === url('admin/users') ? 'active bg-gradient-info' : '' }}"
                    href="{{ route('admin.users') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ url()->current() === url('admin/books') ? 'active bg-gradient-info' : '' }}"
                    href="{{ route('admin.books') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark{{ url()->current() === url('admin/articles') ? 'active bg-gradient-info' : '' }}"
                    href="{{ route('admin.articles') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <span class="nav-link-text ms-1">Journal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark{{ url()->current() === url('admin/reservations') ? 'active bg-gradient-info' : '' }}"
                    href="{{ route('admin.reservations') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Reservation</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ url()->current() === url('admin/profile') ? 'active bg-gradient-info' : '' }}"
                    href="{{ route('admin.profile') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
            <button type="button" class="btn bg-gradient-danger mt-4 w-100" data-bs-toggle="modal"
                data-bs-target="#logout">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
            </button>
        </div>
    </div>
</aside>
