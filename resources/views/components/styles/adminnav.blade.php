<header>
    <nav class="navbar p-0">
        <div class="container-fluid p-0">
                <a class="navbar-brand col-sm-2 ms-2 d-flex justify-content-center admin_brand" href="{{ route('admin') }}">
                    Ideanaleh 
                </a>
                <div class="col pe-5 admin_nav">
                    <div class="row py-2 ps-5 ms-2 d-flex justify-content-end align-items-center">
                        <div class="col h5 d-none d-sm-block">
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
                        <div class="col-3 d-block d-sm-none d-flex justify-content-end text-white">
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