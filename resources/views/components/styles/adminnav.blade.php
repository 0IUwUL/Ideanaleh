<header>
    <nav class="navbar p-0 fixed-top shadow admin_header">
        <div class="container-fluid p-0 bg-light">
            <div class="col-2 col-sm-2 mx-5 d-flex justify-content-center">
                <button class="btn" data-menu-icon-btn>
                    <i class="fa-solid fa-bars d-flex align-self-center fs-4 d-block"></i>
                </button>
                
                <a class="navbar-brand admin_brand m-0" href="{{ route('admin') }}">
                    Ideanaleh 
                </a>
            </div>
            <div class="col admin_nav">
                <div class="row py-2 mx-4 d-flex justify-content-end align-items-center">
                    <div class="col-6 h5 d-none d-sm-block">
                        Good Day, (Name)
                    </div>
                    <div class="navbread col p-0 d-none d-sm-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb d-flex justify-content-end align-self-center m-0">
                                <li class="breadcrumb-item"><a class = "fw-bolder">Profile</a></li>
                                <li class="breadcrumb-item"><a class = "fw-bolder" role = "button" href="{{ route('logout') }}">Log out</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 d-block d-sm-none d-flex justify-content-end text-white p-0">
                        <div class="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <button class="btn text-white d-block d-sm-none">
                                <i class="fa-solid fa-screwdriver-wrench fs-3"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a role = "button" type = "submit" class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<header>