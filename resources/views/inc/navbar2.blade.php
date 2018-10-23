<div class="pos-f-t">    
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
      <button id='btn_tglr' class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li>
            <span class="navbar-text font-weight-bold" style='font-size: 1.11em'>
                @yield('tabTitle')
            </span>
        </li>                
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </li> --}}
        @else
            <li class='mr-4'>
                <span class="navbar-text font-weight-bold hidewhensmall">Welcome! {{ Auth::user()->name }}</span>
            </li>                    
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user-circle nbicon pt-1"></i> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    
                    <a class="dropdown-item" href="{{ route('changepw') }}">
                        {{ __('Change Password') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    </div>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
        {{-- <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div> --}}
        <ul class="nav flex-column sidebar-wrapper pt-2 px-3">
                <li class="nav-item p-1 logo-img text-center mb-2">
                    <span class="badge badge-pill badge-light mb-3 p-0">
                        <a class="nav-link text-center" href="/1_mes/" >
                            <img src="{{ asset('images/primatech-logo.png') }}" style="width: 146px; height: 28px">
                        </a>
                    </span>
                </li>    
                <li class="nav-item my-2">
                    <a class="nav-link sblink" href="{{ route('dashboard') }}"><i class="fas fa-chart-line mr-3 sbicon"></i><span class='pb-2'>DASHBOARD</span></a>
                </li>
                @if (Auth::user()->admin == 1)
                    <li class="nav-item my-2">
                        <a class="nav-link sblink" href="{{ route('admin') }}"><i class="fas fa-unlock-alt mr-3 sbicon"></i>ADMIN</a>
                    </li>
                @endif            
                <li class="nav-item my-2">
                    <a class="nav-link sblink" href="{{ route('master') }}"><i class="fas fa-database mr-3 sbicon"></i>MASTER LIST</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link sblink" href="{{ route('scan') }}"><i class="fas fa-barcode mr-3 sbicon"></i>SCAN</a>
                </li>
                {{-- <li class="nav-item my-2">
                    <a class="nav-link sblink" href="{{ route('outgoing') }}"><i class="fas fa-sign-out-alt mr-3 sbicon"></i>OUTGOING</a>
                </li> --}}
            </ul>
    </div>
</div>
{{-- <nav class="navbar navbar-expand navbar-light navbar-laravel">
    <div class="container">              

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li>
                    <span class="navbar-text font-weight-bold" style='font-size: 1.11em'>
                        @yield('tabTitle')
                    </span>
                </li>                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class='mr-4'>
                        <span class="navbar-text font-weight-bold">Welcome! {{ Auth::user()->name }}</span>
                    </li>                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle nbicon pt-1"></i> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            <a class="dropdown-item" href="{{ route('changepw') }}">
                                {{ __('Change Password') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}