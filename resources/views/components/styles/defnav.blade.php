<header>
    <nav class="navbar navbar_default navbar-expand-lg navbar-dark fixed-top p-2">
        <div class="container-fluid d-flex justify-content-between">
            <div class = "col d-flex align-items-center">
                <a class="navbar-brand" href="/">
                    <div class = "display-6">
                        Ideanaleh
                    </div>
                </a>
            </div>

            <div class="col-6 d-none d-sm-block">
                <form method="post" action={{ route('search') }} accept-charset="UTF-8" class="container-fluid" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value = "{{Session::get('search')}}" placeholder="Search" id="search1" aria-label="Search" aria-describedby="search1" required>
                        <button type="submit" class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                {{-- {{Session::get('search') ? 'value = "{{Session::get('search')}}"' : 'placeholder="Search"'}} --}}
            </div>
            @if(!Auth::check())
            <div class="col-2 col-lg-3 d-flex justify-content-end">
                <div class="navbread col p-0 d-none d-lg-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-end align-self-center m-0">
                            <li class="breadcrumb-item"><a class = "fw-bolder" role = "button" data-bs-toggle="modal" data-bs-target="#SignUpModal">Sign Up</a></li>
                            <li class="breadcrumb-item"><a class = "fw-bolder" role = "button" data-bs-toggle="modal" data-bs-target="#LoginModal">Log In</a></li>
                        </ol>
                    </nav>
                </div>
                
                    <div class="dropdown d-none d-sm-block d-lg-none">
                        <a class="btn btn-dark btn-outline-light gear_icon h4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gears"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                            <li><a role = "button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#SignUpModal">Sign Up</a></li>
                            <li><a role = "button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#LoginModal">Log In</a></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler d-block d-sm-none bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            </div>
            @else
            <div class="col col-lg-4 d-flex justify-content-end">
                <div class="navbread col p-0 d-none d-lg-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-end align-self-center m-0">
                        @if (Session::get('admin'))
                            <li class="breadcrumb-item"><a class = "fw-bolder" role = "button" href="{{ route('admin') }}">Admin</a></li>
                        @endif
                        @if (Request::segment(1) == 'settings')
                            <li class="breadcrumb-item"><a role = "fw-bolder" href="/">Home</a></li>
                        @else
                            <li class="breadcrumb-item"><a class = "fw-bolder" role = "button" href="{{ route('settings') }}">Profile</a></li>
                        @endif
                            <li class="breadcrumb-item"><a class = "fw-bolder" id = "modeToast2" data-id = {{Auth::check() ? 'logI' : 'logO'}} data-mode = {{Session::get('mode')}} role = "button" href="{{ route('project.create') }}">My Project</a></li>
                            <li class="breadcrumb-item"><a class = "fw-bolder" role = "button" href="{{ route('logout') }}">Log out</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="logged dropdown d-none d-sm-block d-lg-none">
                    <a class="btn btn-dark btn-outline-light gear_icon h4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gears"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end m-0">
                        @if (Session::get('admin'))
                            <li><a role = "button" class="dropdown-item" href="{{ route('admin') }}">Admin</a></li>
                        @endif
                        @if (Request::segment(1) == 'settings')
                            <li><a role = "button" class = "dropdown-item" href="/">Home</a></li>
                        @else
                            <li><a role = "button" class = "dropdown-item" href="{{ route('settings') }}">Profile</a></li>
                        @endif
                            <li><a role = "button" class = "dropdown-item" id = "modeToast3" data-id = {{Auth::check() ? 'logI' : 'logO'}} data-mode = {{Session::get('mode')}} href="{{ route('project.create') }}">My Project</a></li>
                            <li><a role = "button" class = "dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler d-block d-sm-none bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerLogged" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
            </div>
            @endif

        </div>
        <div class="collapse navbar-collapse pb-2" id="navbarToggler">
            <div class="d-block d-sm-none nav_home col">
                <ul class = "dropdown">
                    <li class="dropdown-item text-white"><a role = "button" data-bs-toggle="modal" data-bs-target="#SignUpModal">Sign Up</a></li>
                    <li class="dropdown-item text-white"><a role = "button" data-bs-toggle="modal" data-bs-target="#LoginModal">Log In</a></li>
                </ul>
                <form method="post" action={{ route('search') }} accept-charset="UTF-8" class="d-flex" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search"  id="search2" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" required>
                        <button type="submit" class="btn input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="collapse navbar-collapse pb-2" id="navbarTogglerLogged">
            <div class="d-block d-sm-none nav_home col">
                <ul class="dropdown ps-3">
                    @if (Session::get('admin'))
                        <li class="dropdown-item"><a class = "dropdown-item" role = "button" href="{{ route('admin') }}">Admin</a></li>
                    @endif
                    @if (Request::segment(1) == 'settings')
                        <li class = "dropdown-item"><a class = "dropdown-item" role = "button" href="/">Home</a></li>
                    @else
                        <li class = "dropdown-item"><a class = "dropdown-item" role = "button" href="{{ route('settings') }}">Profile</a></li>
                    @endif
                        <li class = "dropdown-item"><a class = "dropdown-item" role = "button" id = "modeToast4" data-id = {{Auth::check() ? 'logI' : 'logO'}} data-mode = {{Session::get('mode')}} href="{{ route('project.create') }}">My Project</a></li>
                        <li class = "dropdown-item"><a class = "dropdown-item" role = "button" href="{{ route('logout') }}">Log out</a></li>
                </ul>
                <form method="post" action={{ route('search') }} accept-charset="UTF-8" class="d-flex" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search3" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" required>
                        <button type="submit" class="btn input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<x-authmodals/>
<x-googleauthmodals/>
