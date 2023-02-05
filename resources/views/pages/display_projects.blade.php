@extends('layouts.default')

@section('content')
<x-styles.defnav/>

<div class="filter pb-5">
    <div class="container-fluid filter_nav p-0">
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
        <hr class="filter">
    </div>
    <div class="container mt-5" id="content_projects">
        @if($ProjArg['search'])
            <div class="row">
                <h1>Search result:</h1>
            @if(Session::get('search'))
                <h5>Projects with relation to <b>"{{Session::get('search')}}"</b> ({{$ProjArg['projects']->total()}})</h5>
            @else
                <h5>There are no projects found with <b>"{{Session::get('search')}}"</b></h5>
            @endif
            </div>
        @else
            <h5>Project(s) found: ({{$ProjArg['projects']->total()}})</h5>
        @endif
        
        <div class="row g-5 pt-5">
            @foreach($ProjArg['projects'] as $key => $project)
                <div class="col-md-6">
                    <a href={{ url('project/view/'.$project['id']) }} role = "button">
                        <div class="card h-100">
                            <div class="card-img">
                                    <img src={{asset('storage/'.$project['banner'])}} class="card-img-top" alt="project_banner" {{$key > 1 ? 'loading = lazy' : ''}}>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6 title_img">
                                            <img src={{asset('storage/'.$project['logo'])}} class="mx-auto" alt="project_logo" {{$key > 1 ? 'loading = lazy' : ''}}>
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
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
        <div id="links">
            {{$ProjArg['projects']->links()}}
        </div>
        
</div>
<div class="divider"></div>
<x-styles.footer/>
@endsection