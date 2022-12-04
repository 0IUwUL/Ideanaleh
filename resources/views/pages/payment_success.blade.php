@extends('layouts.default')

@section('content')
<x-styles.defnav/>

<div class="container payment_header">
    <div class="row d-flex justify-content-center">
        <div class="col-7 d-flex justify-content-center">
            <div class="card col">
                <div class="card-header p-5 bg_card text-center text-{{$dataArg['color']}}">
                    <i class="{{$dataArg['icon']}}"></i>
                  </div>
                <div class="card-body text-center">
                  <h3 class="card-title my-5">Payment {{$dataArg['title']}}</h3>
                  <p class="card-text mt-3 fs-5">Payment transaction was {{$dataArg['text']}}.</p>
                  <a href="{{ url('project/view/'.$dataArg['idArg']) }}" class="btn btn-primary">Return to the project</a>
                </div>
            </div>
        </div>
    </div>
    
</div>


@endsection