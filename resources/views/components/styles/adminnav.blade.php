<header>
    <nav class="navbar p-0 fixed-top shadow admin_header">
        <div class="container-fluid d-flex row justify-content-between p-0 bg-light">
            <div class="col-8 col-sm-4 col-md-3 col-lg-2 row d-flex justify-content-center">
                <div class="col d-flex ms-5 p-0 justify-content-center align-content-center">
                    <div class="p-0 d-flex">
                        <button class="btn p-0" data-menu-icon-btn>
                            <i class="fa-solid fa-bars fs-4 d-block"></i>
                        </button>
                    </div>
                    <div>
                        <a class="navbar-brand admin_brand m-0" href="/">
                            Ideanaleh 
                        </a>
                    </div>
                </div>
            </div>
            <div class="col col-sm-8 col-md-9 col-lg-10 row p-0">
                <div class="d-flex flex-row align-items-center admin_nav justify-content-end">
                    <div class="col-3 h5 d-none d-sm-block align-middle m-0">
                        Good Day, {{Auth::user()->Fname}}
                    </div>
                    <div class="col-9 d-none d-sm-block h5 align-middle m-0 fs-2">
                        <nav class="crumb" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item admin"><a class = "text-decoration-none text-light fw-bolder" role = "button" href="/">Web page</a></li>
                              <li class="breadcrumb-item admin"><a class = "text-decoration-none text-light fw-bolder" role = "button" href={{ url('settings') }}>Settings</a></li>
                              <li class="breadcrumb-item admin"><a class = "text-decoration-none text-light fw-bolder" role = "button" href="{{ route('logout') }}">Log out</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="dropdown d-block d-sm-none">
                        <a class="btn btn-dark btn-outline-light gear_icon h4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gears"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                            <li><a class="dropdown-item" role = "button" href="/">Web page</a></li>
                            <li><a class="dropdown-item" role = "button" href={{ url('settings') }}>Settings</a></li>
                            <li><a class="dropdown-item" role = "button" href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<header>