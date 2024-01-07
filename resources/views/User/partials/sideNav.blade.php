<aside class="nav-container">
    <nav class="nav-wrapper">
        <ul>
            <li id="home">
                <a href="{{ route('home') }}">
                    <i class="fa-sharp fa-solid fa-house"></i>
                    Home
                </a>
            </li>
            <li id="books">
                <a href="{{ route('books') }}">
                    <i class="fa-sharp fa-solid fa-book"></i>
                    Books
                </a>
            </li>
            <li id="jurnal">
                <a href="{{ route('article') }}">
                    <i class="fa-sharp fa-solid fa-file-lines"></i>
                    Journal
                </a>
            </li>
            <li id="koleksi">
                <a href="{{ route('Collection.index') }}">
                    <i class="fa-sharp fa-solid fa-bookmark"></i>
                    Collection
                </a>
            </li>
            <li id="account">
                <a href="{{ route('account') }}">
                    <i class="fa-sharp fa-solid fa-user"></i>
                    Account
                </a>
            </li>
        </ul>
        <ul>
            <li style="cursor: pointer;
            " onclick="showModal('logout')" class="logout">
                <a>
                    <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                    Log Out
                </a>
            </li>
        </ul>
    </nav>
</aside>

<div style="z-index: 99999;" id="logout" class="modal delete">
    <div id="modal-header">
        <h1 style="font-size: 24pt;">
            <span style="color: var(--secondaryColor) ;">Are</span>
            <span style="color: var(--orangseSecondaryColor) ;">You</span>
            Sure to Log Out?
        </h1>
    </div>
    <div class="modal-body">
        <button onclick="window.location.href='{{ route('logout') }}'" class="btn-style-2">Yes</button>
        <button onclick="closeModal('logout')" class="btn-style-2 no">No</button>
    </div>
</div>
