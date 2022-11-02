<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid d-flex justify-content-evenly">
            <div class = "d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <div class = "display-6">
                        Ideanaleh
                    </div>
                </a>
            </div>

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button> -->
            
            <div class="col-7">
                <form class="container-fluid">
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
            @if(!session()->has('loginId'))
            <div class="col-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-light btn-outline-dark mx-3" data-bs-toggle="modal" data-bs-target="#SignUpModal">
                        Sign Up
                    </button>
                    <button type="button" class="btn btn-primary btn-outline-light text- white mx-3" data-bs-toggle="modal" data-bs-target="#LoginModal">
                        Login
                    </button>
            </div>
            @else
            <div class="col-2 d-flex justify-content-end">
                <form method="get" action="{{ route('logout') }}">
                <button type="submit" class="btn btn-primary btn-outline-light text- white mx-3">
                    Logout
                </button>
                </form>
            </div>
            @endif

        </div>
       
    </nav>
</header>
<x-defhead/>
