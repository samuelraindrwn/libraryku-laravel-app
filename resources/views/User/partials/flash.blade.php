@if ($message = Session::get('success'))
    <div id="sukses" class="msg-container">
        <i class="fa-sharp fa-solid fa-circle-check msg-logo"
            style=" border-right: 3px solid #52a33c;
        color: #52a33c;"></i>
        <h3>{{ $message }}</h3>
        <span onclick="closeMsg('sukses')" title="Close" class="close-msg"><i
                class="fa-sharp fa-solid fa-circle-xmark"></i></span>
        <div style="background-color: #52a33c;" class="duration"></div>
    </div>
@endif
@if ($message = Session::get('error'))
    <div id="failed" class="msg-container">
        <i class="fa-sharp fa-solid fa-ban msg-logo"
            style="border-right: 3px solid #fa6d68;
        color: #fa6d68;"></i>
        <h3>{{ $message }}</h3>
        <span onclick="closeMsg('failed')" title="Close" class="close-msg"><i
                class="fa-sharp fa-solid fa-circle-xmark"></i></span>
        <div style="background-color:#fa6d68;" class="duration"></div>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div id="warning" class="msg-container">
        <i id="msg-logo" class="fa-solid fa-triangle-exclamation msg-logo"
            style="  border-right: 3px solid #f6d028;
        color: #f6d028;"></i>
        <h3>{{ $message }}</h3>
        <span onclick="closeMsg('warning')" title="Close" class="close-msg"><i
                class="fa-sharp fa-solid fa-circle-xmark"></i></span>
        <div style="background-color:#f6d028;" class="duration"></div>
    </div>
@endif
