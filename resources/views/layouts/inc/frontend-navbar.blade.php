<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline ">

                @php
                    $setting = App\Models\General::find(1);
                @endphp
                @if ($setting)
                    <img src="{{ asset('upload/settings/' . $setting->logo) }}" class="w-100" alt="logo">
                @endif
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">


            <a href="/" class="navbar-brand d-inline d-sm-inline d-md-none ">
                <img src="{{ asset('assets/images/logo.png') }}" style="width: 120px" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    @php
                        // $categories = App\Models\Category::where('navbar_status', '0')
                        //     ->where('status', '0')
                        //     ->get();
                        $categories = App\Models\Category::all()->take(10);
                    @endphp

                    @foreach ($categories as $cateitem)
                        <li class="nav-item">

                            <a class="nav-link"
                                href="{{ url('tutorial/' . $cateitem->slug) }}">{{ $cateitem->name }}</a>
                        </li>
                    @endforeach
                    @if (Auth::check())
                        <li>
                            <a class="btn btn-danger nav-link" href="{{ route('login') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                    <li class="nav-item">

                        <a class="bg-primary nav-link"
                            href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">

                        <a class="bg-info nav-link "
                            href="{{ url('/register') }}">Register</a>
                    </li>

                    @endif

                </ul>

            </div>
        </div>
    </nav>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
