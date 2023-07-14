{{-- Header --}}
<header>
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <div class="col-4">
                    <a class="navbar-brand d-flex align-items-center" href="http://localhost:5174/#">
                        <div class="logo_laravel navbar-expand-sm px-2  px-sm-0   ">
                            <div class="fadeIn ">
                                <img class="w-100 logo" src="{{ asset('img/bdoctor__2_-removebg-preview.png') }}"
                                    id="icon" alt="User Icon" />
                            </div>
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>
                </div>
                <!-- Left Side Of Navbar -->
                <div class="col-2">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto align-content-start ">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item ">
                                    <a class="nav-link  inline-block text-decoration-none fw-normal "
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item ">
                                        <a class="nav-link  inline-block text-decoration-none fw-normal"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown ">
                                    <a id="navbarDropdown"
                                        class="nav-link dropdown-toggle  inline-block text-decoration-none fw-normal"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left button-51"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item button-51  inline-block text-decoration-none fw-normal"
                                            href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                        <a class="dropdown-item button-51  inline-block text-decoration-none fw-normal"
                                            href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                        <a class="dropdown-item button-51  inline-block text-decoration-none fw-normal"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none button-51">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
</header>
