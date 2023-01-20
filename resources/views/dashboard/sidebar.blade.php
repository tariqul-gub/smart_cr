<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (Request::is('home')) bg-primary text-light @endif " aria-current="page"
                    href="{{ url('/home') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            @if (auth()->user()->user_type == 'Teacher')
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('user.index')) bg-primary text-light @endif"
                        href="{{ route('user.index') }}">
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('room.index')) bg-primary text-light @endif"
                        href="{{ route('room.index') }}">
                        Room
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('notification.index')) bg-primary text-light @endif"
                        href="{{ route('notification.index') }}">
                        Notification
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('message.index')) bg-primary text-light @endif"
                        href="{{ route('message.index') }}">
                        Message
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('record.index')) bg-primary text-light @endif"
                        href="{{ route('record.index') }}">
                        Record
                    </a>
                </li>
        </ul>
        @endif




    </div>
</nav>
