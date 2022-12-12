@extends('layouts.default')

@section('content')
<x-styles.defnav/>

<div class="nav_filter py-5">
    <div class="container">
        <nav class="row filter_row">
            <div class="col F_display d-none d-sm-block d-flex justify-content-end align-self-center">
                Category:
            </div>
            <div class="col select">
                <select id="category" class="form-select" aria-label="Category select">
                    <option selected disabled value="">Choose category...</option>
                    @foreach($ProjArg['categories'] as $category)
                    <option value="{{$category}}">{{$category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col F_list d-none d-sm-block p-0 d-flex align-self-center">
                listed by: 
            </div>
            <div class="col select">
                <select id="options" class="form-select" aria-label="Filter select">
                    @foreach($ProjArg['options'] as $id => $value)
                    <option value={{$id}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            
        </nav>
    </div>
    <hr>
    <div class="container mt-5">
        <div class="row g-5" id="content_projects">
            @foreach($ProjArg['projects'] as $project)
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-img">
                            <a href={{ url('project/view/'.$project['id']) }}>
                                <img src={{asset('storage/'.$project['banner'])}} class="card-img-top" alt="project_banner">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 title_img">
                                    <a href={{ url('project/view/'.$project['id']) }}>
                                        <img src={{asset('storage/'.$project['logo'])}} class="mx-auto" alt="project_logo">
                                    </a>
                                    <h5 class="card-title d-flex justify-content-center text-center mt-5">{{$project['title']}}</h5>
                                </div>
                                <div class="col-12 col-lg-6 content">
                                    <h5 class = "card-title">Category</h5>
                                    <p class="card-text ms-3">{{$project['category']}}</p>
                                    <h5 class = "card-title">Description</h5>
                                    <p class="card-text ms-3">{{$project['description']}}</p>
                                    <h5 class = "card-title">Tags</h5>
                                    <span class="card-text ms-3">{{$project['tags']}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href={{ url('project/view/'.$project['id']) }} class="btn btn-primary">Visit Project</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection