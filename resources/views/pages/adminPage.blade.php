@extends('layouts.admin')

@section('content')
<x-styles.adminnav/>

<div class="container-fluid">
    <div class="row">
        <div class = "col-2 col-md-2 p-0">
            <button class="btn admin_nav_open d-none"><i class="fa-solid fa-bars fs-4"></i></button>
            <nav class="navbar admin_side fixed-top p-0">
                <div class="toggle">
                    <button class="btn close"><i class="fa-solid fa-xmark fs-4"></i></button>
                </div>
                <div class="container-fluid p-0 admin_list">
                    <ul class="col-1 nav flex-column admin_list text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <li class="admin_nav_list">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa-solid fa-house mx-3 fs-2"></i><p>Home</p>
                            </a>
                        </li>
                        <li class="admin_nav_list">
                            <a class="nav-link" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">
                            <i class="fa-solid fa-users-gear mx-3 fs-2"></i><p>Users</p> 
                            </a>
                        </li>
                        <li class="admin_nav_list">
                            <a class="nav-link" id="v-pills-projects-tab" data-bs-toggle="pill" data-bs-target="#v-pills-projects" type="button" role="tab" aria-controls="v-pills-projects" aria-selected="false">
                            <i class="fa-solid fa-rectangle-list mx-3 fs-2"></i><p>Projects</p> 
                            </a>
                        </li>
                        <li class="admin_nav_list">
                            <a class = "nav-link" type = "submit" href="{{ route('logout') }}">
                                <i class="fa-regular fa-share-from-square mx-3 fs-2"></i><p>Logout</p> 
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Dashboard -->
        <div class="col p-0" style = "overflow-y: scroll;">
            <div class="tab-content pb-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                    <div class="container-fluid mt-5">
                        <div class="row col-sm-12 gy-3 admin_display mx-auto">
                            <div class="col-lg-3 col-md-5 col-sm-8 card admin_content">
                                <div class="card-body">
                                    <div class="card-title">
                                        User count:
                                        <div class="card-text mt-3">
                                            <h3>1000</h3>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-sm-8 card admin_content">
                                <div class="card-body">
                                    <div class="card-title">
                                        Project count:
                                        <div class="card-text mt-3">
                                            <h3>1000</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-sm-8 card admin_content">
                                <div class="card-body">
                                    <div class="card-title">
                                        Report unresolved:
                                        <div class="card-text mt-3">
                                            <h3>1000</h3>
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
                                            <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: scroll">
                                                <table class="table">
                                                    <thead class = "table-dark sticky-top">
                                                        <tr>
                                                            <th scope = "col">#</th>
                                                            <th scope = "col">(Name)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope = "col">1</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">2</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">3</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">4</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">5</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
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
                                            <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: scroll">
                                                <table class="table">
                                                    <thead class = "table-dark sticky-top">
                                                        <tr>
                                                            <th scope = "col">#</th>
                                                            <th scope = "col">(Title)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope = "col">1</th>
                                                            <th scope = "col">Wow</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">2</th>
                                                            <th scope = "col">Amazing</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">3</th>
                                                            <th scope = "col">Sugoi</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">4</th>
                                                            <th scope = "col">Ramen</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">5</th>
                                                            <th scope = "col">Shish</th>
                                                        </tr>
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
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                    <div class="container-fluid mt-5">
                        <div class="row table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>User Number</th>
                                        <th>Last Name</th>
                                        <th>Issue/Report</th>
                                        <th>Action</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade"  id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab" tabindex="0">
                <div class="container-fluid mt-5">
                        <div class="row table-responsive" style = "max-height: 40vh; overflow-y: scroll">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Project Number</th>
                                        <th>Project Name</th>
                                        <th>Issue/Report</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></td>
                                        <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Top Supported Projects
                                            <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: scroll">
                                                <table class="table">
                                                    <thead class = "table-dark sticky-top">
                                                        <tr>
                                                            <th scope = "col">#</th>
                                                            <th scope = "col">(Title)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope = "col">1</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">2</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">3</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">4</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">5</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Top Genre Supported
                                            <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: scroll">
                                                <table class="table">
                                                    <thead class = "table-dark sticky-top">
                                                        <tr>
                                                            <th scope = "col">#</th>
                                                            <th scope = "col">(Genre)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope = "col">1</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">2</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">3</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">4</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope = "col">5</th>
                                                            <th scope = "col">Mark</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="row table-responsive" style = "max-height: 40vh; overflow-y: scroll">
                                <table class="table align-middle">
                                    <thead class = "table-dark sticky-top">
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Developer</th>
                                            <th>
                                                <button class = "btn btn-dark dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Genre
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                                </ul>
                                            </th>
                                            <th>
                                                <button class = "btn btn-dark dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Date
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                                </ul>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                            <td>12-06-2000</td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-flag"></i></button></td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                            <td>12-06-2000</td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-flag"></i></button></td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                            <td>12-06-2000</td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-flag"></i></button></td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                            <td>12-06-2000</td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-flag"></i></button></td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                                            <td>12-06-2000</td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-flag"></i></button></td>
                                            <td class = "d-flex justify-content-center"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-circle-xmark"></i></button></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="FlagModal" tabindex="-1" aria-labelledby="FlagModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-warning">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="FlagModalHeader">Inform the issue to the developer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="mb-3">
                <label for="LabelSubject" class="form-label">Subject</label>
                <input type="text" name = "" class="form-control" id="FormControlLabelSubject">
            </div>
            <div class="mb-3">
                <label for="LabelContentIssue" class="form-label">Message Content</label>
                <textarea class="form-control" name = "" id="FormControlLabelContentIssue" rows="3"></textarea>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send to Developer</button>
      </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="ResolvedModal" tabindex="-1" aria-labelledby="ResolvedModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResolvedModalHeader">Is the issue resolved? <i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>


<div class="modal fade" id="DeleteIssueModal" tabindex="-1" aria-labelledby="DeleteIssueModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteIssueModalHeader">Is the issue false? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>
@endsection