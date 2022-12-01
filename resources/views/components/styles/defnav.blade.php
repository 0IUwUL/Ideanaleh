<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-2">
        <div class="container-fluid d-flex justify-content-between">
            <div class = "d-flex align-items-center">
                <a class="navbar-brand" href="/">
                    <div class = "display-6">
                        Ideanaleh
                    </div>
                </a>
            </div>

            <div class="col-7 d-none d-sm-block">
                <form class="container-fluid" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
            
            @if(!Auth::check())
            <div class="col-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-light btn-outline-dark mx-3 d-none d-xxl-block" data-bs-toggle="modal" data-bs-target="#SignUpModal">
                        Sign Up
                    </button>
                    <button type="button" class="btn btn-primary btn-outline-light text- white mx-3 d-none d-xxl-block" data-bs-toggle="modal" data-bs-target="#LoginModal">
                        Log In
                    </button>
                    <div class="dropdown d-none d-sm-block d-xxl-none">
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
            <div class="col-2 d-flex justify-content-end">
                <div class="logged dropdown d-none d-sm-block">
                    <a class="btn btn-dark btn-outline-light gear_icon h4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gears"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end m-0">
                        @if (Request::segment(1) == 'settings')
                            <li><a role = "button" class = "dropdown-item" href="/">Home</a></li>
                        @else
                            <li><a role = "button" class = "dropdown-item" href="{{ route('settings') }}">Profile</a></li>
                        @endif
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
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="collapse navbar-collapse pb-2" id="navbarTogglerLogged">
            <div class="d-block d-sm-none nav_home col">
                <ul class="dropdown">
                    @if (Request::segment(1) == 'settings')
                        <li><a role = "button" class = "dropdown-item" href="/">Home</a></li>
                    @else
                        <li><a role = "button" class = "dropdown-item" href="{{ route('settings') }}">Profile</a></li>
                    @endif
                        <li><a role = "button" class = "dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                </ul>
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<x-authmodals/>
<x-googleauthmodals/>
