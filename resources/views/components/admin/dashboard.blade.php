<div class="container-fluid mt-5">
    <div class="row col-sm-12 gy-3 admin_display mx-auto">
        <div class="col-lg-3 col-md-5 col-sm-8 card admin_content">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col">
                            <div class="row d-flex justify-content-center">
                                User count:
                            </div>
                            <div class="row card-text mt-3">
                                <h3>{{$details['users']}}</h3>   
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center align-self-center p-0">
                            <i class="fa-solid fa-user admin_icon text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-8 card admin_content">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col">
                            <div class="row d-flex justify-content-center">
                                Project count:
                            </div>
                            <div class="row card-text mt-3">
                                <h3>{{$details['project']}}</h3>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center align-self-center p-0">
                            <i class="fa-solid fa-bars-progress admin_icon text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-8 card admin_content">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col">
                            <div class="row d-flex justify-content-center">
                                Report unresolved:
                            </div>
                            <div class="row card-text mt-3">
                                <h3>{{$details['issues']}}</h3>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center align-self-center p-0">
                            <i class="fa-solid fa-triangle-exclamation admin_icon text-danger"></i>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 admin_chart mt-5"> 
        <!-- refer to chart.js -->
            <canvas id="Users"></canvas>
        </div>
        <div class="col col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        Top Developers
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: auto">
                            <table class="table">
                                <thead class = "table-dark sticky-top">
                                    <tr>
                                        <th scope = "col">#</th>
                                        <th scope = "col">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details['developers']['developer'] as $name)
                                    <tr>
                                        <th scope = "col">{{$name['user_id']}}</th>
                                        <th scope = "col"></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        Top Projects
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: auto">
                            <table class="table">
                                <thead class = "table-dark sticky-top">
                                    <tr>
                                        <th scope = "col">#</th>
                                        <th scope = "col">Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details['developers']['projects'] as $title)
                                    <tr>
                                        <th scope = "col">{{$title['id']}}</th>
                                        <th scope = "col">{{$title['title']}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-5 admin_chart">
            <!-- refer to chart.js -->
            <canvas id="Proj"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mt-5 admin_chart">
            <!-- refer to chart.js -->
            <canvas id="Supporters"></canvas>
        </div>
        <div class="col col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        Top Donators
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: auto">
                            <table class="table">
                                <thead class = "table-dark sticky-top">
                                    <tr>
                                        <th scope = "col">#</th>
                                        <th scope = "col">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details['donators'] as $name)
                                    <tr>
                                        <th scope = "col">{{$name['user']['id']}}</th>
                                        <th scope = "col">{{$name['user']['Lname']}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>