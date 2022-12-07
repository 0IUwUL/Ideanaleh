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
    <div class="container">
        <div class="row gy-3" id="content_projects">
            @foreach($ProjArg['projects'] as $project)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">{{$project['title']}}</h5>
                            <p class="card-text">{{$project['description']}}</p>
                            <span class="card-text">{{$project['tags']}}</span>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ url('project/view/'.$project['id']) }}" class="btn btn-primary">Visit Project</a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>

@endsection