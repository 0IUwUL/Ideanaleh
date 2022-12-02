@extends('layouts.default')

@section('content')
<x-styles.defnav/>

<div class="nav_filter nav">
    <div class="container-fluid">
        <div class="navigation bg-light d-flex justify-content-center align-content-center">
            <ul>
                <li class="Flist active">
                    <a href="#">
                        <span class="icon"><i class="fa-brands fa-github"></i></span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li class="Flist">
                    <a href="#">
                        <span class="icon"><i class="fa-brands fa-discord"></i></span>
                        <span class="text">Project</span>
                    </a>
                </li>
                <li class="Flist">
                    <a href="#">
                        <span class="icon"><i class="fa-solid fa-cloud"></i></span>
                        <span class="text">Rawr</span>
                    </a>
                </li>
                <li class="Flist">
                    <a href="#">
                        <span class="icon"><i class="fa-solid fa-hippo"></i></span>
                        <span class="text">Amazing</span>
                    </a>
                </li>
                <div class="indicator"></div>
            </ul>
        </div>
    </div>
</div>

@endsection