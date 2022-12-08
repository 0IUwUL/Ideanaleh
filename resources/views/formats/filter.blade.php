@foreach($ProjArg->items() as $project)
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