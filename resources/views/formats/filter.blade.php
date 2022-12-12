@foreach($ProjArg as $project)
    <div class="col-md-6">
        <a href={{ url('project/view/'.$project['id']) }} role = "button">
            <div class="card h-100">
                <div class="card-img">
                        <img src={{asset('storage/'.$project['banner'])}} class="card-img-top" alt="project_banner">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6 title_img">
                                <img src={{asset('storage/'.$project['logo'])}} class="mx-auto" alt="project_logo">
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