<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href={{ url('/logs') }} class="navbar-brand">
        <img src="{{ asset('dist/img/sekawanmedia.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nikel Sekawan</span>
        </a>
        <a href="/login" class="btn btn-secondary btn-custom">Logs</a>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto navbar-nav ms-auto">
            @guest
            @else
                <li class="nav-item">
                    @if (Auth::user()->role == 'admin')
                        <a href={{ url('/admin') }} class="nav-link" style="cursor: default">
                        @else
                            <a href={{ url('/approval') }} class="nav-link" style="cursor: default">
                    @endif
                    {{ Auth::user()->name }}
                    </a>
                </li>
    
                <li class="nav-item">
                    
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                        <i class="fas fa-sign-out-alt mx-2"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
