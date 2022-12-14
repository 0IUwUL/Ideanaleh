@extends('layouts.projectView')



@section('content')
<x-styles.defnav/> 
<!-- Product Section -->
<div class="progress-container">
  <div class="progress-bar" id="progress-bar">
      <div></div>
  </div>
</div>
<section class="container-fluid products py-5" id=product>
  <div class="container">
        <!-- mobile -->
      <h1 class="product-name product-mobile-name my-5 d-block d-lg-none text-center">{{$project['title']}}</h1>
      <div class="tags product-mobile-name d-lg-none my-3 d-block text-center">
        <i style="color:yellow" class="bi bi-tags"></i><h6>tags: {{$project['tags']}}</h6>
      </div>
      
      <div class="row">
        <div class="col-md-6 gx-5">
          <div class="product-media">
            <div class="product-media-container">
              <div class="images-carousel owl-carousel owl-theme">
                <div class="item">
                  <img img-zoom src="{{asset('storage/'.$project['logo']);}} ">
                </div>
                <div class="item">
                  {{-- NOTE TO FRONTEND DEVS PLS STYLE THE BANNER -RamonDev --}}
                  <img img-zoom src="{{asset('storage/'.$project['banner']);}} ">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-info">

                    <!-- desktop -->
                    <!-- if button centered add </div> here, else put div before section closing-->
                    <h1 class="product-name my-4 d-lg-block d-none">{{$project['title']}}</h1>
                    <div class="tags my-4 d-lg-block d-none">
                        <h6><i style="color:yellow" class="bi bi-tags"></i>&nbsp tags: {{$project['tags']}}</h6>
                    </div>
                    <!-- Progress Bars -->
                    {{-- Note to future RamonDev: Get the code for the bars in the SE2 project -RamonDev --}}
                    <div class="progress-bars row g-0 mt-3">
                        <div class="progress mx-4 mt-5" style="width: 90%;">
                            <div class="progress-bar" role="progressbar" style="width: 0%; height:20px; font-weight:bold;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <p class="product-price mx-4 mt-2" style>PHP 0.00 / {{number_format($project['target_amt'],2)}} Target Donations</p>
                        <div class="progress mx-4" style="width: 90%;">
                            <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 0%; height:20px; font-weight:bold;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <p class="product-price mx-4 mt-2 mb-4" style>PHP 0.00 / {{number_format($project['target_milestone'],2)}} Milestone Donations</p>
                    </div>


                    <!-- Project Summary Description Desktop-->
                <div class="product-description d-lg-block d-none mt-3 mb-4">
                    <p>{{$project['description']}}</p>
                </div>
            </div>
          
            <div class="product-form py-4 justify-content-center">
                <div class="col-lg-auto text-center" >

                  @if($project['user_id'] == Auth::id())
                  {{-- EDIT BUTTON --}}
                  <a href="{{url('project/edit/'.$project['id'])}}"><button type="button" class="btn add-to-cart w-50 mb-3"><span class="fa fa-cart-shopping"></span>&nbsp EDIT</button></a>
                  @endif

                  {{-- FOLLOW UNFOLLOW BUTTON --}}
                  <div name="ProjectFollowButton" id="ProjectFollowButton">
                      <button type="button" id="FollowUnfollowButton" class="btn add-to-cart w-50" data-projectId={{$project['id']}}>
                        <span class="fa{{$project['isFollowed'] ? "-regular" : ""}} fa-heart"></span>
                        &nbsp 
                        {{$project['isFollowed'] ? "UNFOLLOW" : "FOLLOW"}}
                      </button>
                  </div>

                  {{-- DONATE BUTTON --}}
                  <a href="http://localhost:8000/project/view/{{$project['id']}}#tiers-section"><button type="button" class="btn add-to-cart w-50 mt-3"><span class="fa fa-cart-shopping"></span>&nbsp Support the Project</button></a>
                </div>  
            </div>
            
            </div>
        </div>
      </div>
      <!-- Project Description for Mobile -->
      <div class="product-description d-block d-lg-none text-center my-5">
        <p>{{$project['description']}}
        </p>
        <a class="text-decoration-none text-light">Read More</a>
      </div>
</section>
<!-- Product Section end -->

<!-- notice -->
<div class="container-fluid notifs mt-1" id="notice">
  <div class="container">
    <div class="row mt-3">
      <div class="col-4">
        <span class="d-inline-block float-right position-absolute">
          <i style="font-size:18px" class="fa-sharp fa-solid fa-wand-magic-sparkles"></i>
        </span>
        <span class="d-inline-block mx-4"><h6>Idianaleh is a platform made to connect creators to backers to fund their projects</h6></span>
      </div>

      <div class="col-4">
        <span class="d-inline-block float-right position-absolute">
          <i style="font-size:18px" class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
        </span>
        <span class="d-inline-block mx-4"><h6>Creators should keep backers updated on a regular basis, but backers' rewards are not guaranteed.</h6></span>
      </div>

      <div class="col-4">
        <span class="d-inline-block float-right position-absolute">
          <i style="font-size:18px" class="fa-sharp fa-solid fa-mug-hot"></i>
        </span>
        <span class="d-inline-block mx-4"><h6>Come along on the voyage into the innovative future</h6></span>
      </div>

    </div>
  </div>
</div>
<!-- notice end -->

<!-- tiers -->
<div id="tiers-section" class="tiers-section"></div>
<div class="container-fluid tiers">
  <h1 class="tiers-title text-center text-light">Tiers</h1>
  <div class="row justify-content-center center-block">
    
    <!-- Tiers START -->
    @foreach($project['tiers'] as $t=>$tier)
    <div class="card a mx-4 mt-4" style="width: 18rem;">
      <div class="card-icon"><i class="bi bi-circle"></i></div>
        <div class="card-body">
          {{-- Tier Name --}}
          <h5 class="card-title">{{$tier['name']}}</h5>
          {{-- Tier Ammount --}}
          <p class="card-text">{{$tier['amount']}}</p>
          {{-- Tier Benefit --}}
          <p class="card-text">{{$tier['benefit']}}</p>
          <button type="button" 
              class="btn btn-outline-light" 
              data-bs-toggle="modal" 
              data-bs-target="#amtModal"
              {{-- data-projectId={{$project['id']}} 
              data-tierAmount={{$tier['amount']}} --}}
          >
            Donate
          </button>
      </div>
    </div>
    @endforeach
    <!-- Tiers END -->
  </div>
</div>

  <section class="container-fluid info bg-brown-medium px-0" id="adt-info">
    <div class="container-lg py-5 px-0">
      <h2 class="text-center title my-3 my-md-4 my-lg-5 px-2 px-sm-0">Additional Project Information</h2>

      <div class="container-lg pt-3 px-0">
        <ul class="nav nav-pills mb-0 overflow-auto flex-nowrap justify-content-start justify-content-md-center gap-1"
          id="pills-tab" role="tablist">
          <li class="nav-item px-1" role="presentation">
            <button class="nav-link py-2 px-5 active" id="pills-campaign-tab" data-bs-toggle="pill"
              data-bs-target="#pills-campaign" type="button" role="tab" aria-controls="pills-campaign"
              aria-selected="true">Campaign</button>
          </li>
          <li class="nav-item px-1" role="presentation">
            <button class="nav-link py-2 px-5" id="pills-update-tab" data-bs-toggle="pill"
              data-bs-target="#pills-update" type="button" role="tab" aria-controls="pills-update"
              aria-selected="false">Updates</button>
          </li>
          <li class="nav-item px-1" role="presentation">
            <button class="nav-link py-2 px-5" id="pills-comments-tab" data-bs-toggle="pill"
              data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments"
              aria-selected="false">Comments</button>
          </li>
          <li class="nav-item px-1" role="presentation">
            <button class="nav-link py-2 px-5" id="pills-backers-tab" data-bs-toggle="pill"
              data-bs-target="#pills-backers" type="button" role="tab" aria-controls="pills-backers"
              aria-selected="false">Backers</button>
          </li>
        </ul>

        <div class="tab-content px-3" id="pills-tabContent">
          <!-- Campaign tab -->
          <x-project.view.campaign :project="$project"/>
          <!-- Update tab -->
          <x-project.view.updates :id="$project['id']" :dev="$project['user_id']" :updates="$project['updates']"/>
          <!-- comments item tab -->
          <x-project.view.comments :id="$project['id']" :comments="$project['comments']"/>
          <!-- Backers item tab -->
          <x-project.view.backers/>
        </div>
    </div>

    <div class="container-fluid" id="rcmd-tabs">
        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  @if(Auth::check())
                    <div class="row">
                      <h2>Recommended Projects under this Category</h1>
                        @foreach($project['recommend'][0] as $index => $category)
                        @if($index<3) 
                          <div class="col-md-4 mb-3">
                            <div class="card img-hover shadow-sm bg-body rounded">
                              <div class="img-holder">
                                <a href={{ url('project/view/'.$category['id']) }}>
                                  <img src="{{asset('storage/'.$category['banner']);}} " loading="lazy">
                                </a>
                              </div>
                              <div class="card-body text-dark">
                                <h4 class="card-title">{{$category['title']}}</h4>
                                  <p class="card-text text-truncate" style="max-height: 10vh">{{$category['description']}}</p>
                              </div>
                              <div class="d-flex justify-content-between p-3">
                                  <div class="btn-group">
                                      <a type="button" href={{ url('project/view/'.$category['id']) }} class="btn btn-sm btn-outline-secondary">View</a>
                                      
                                  </div>
                                  <div class="text-muted">{{$category['date']}}</div>
                              </div>
                            </div>
                          </div>
                        @endif
                        @endforeach
                    </div><br>
                    <div class="row">
                      <h2>Other Projects That You May Like</h1>
                        @foreach($project['recommend'][1] as $index => $category)
                        @if($index < 3)
                          <div class="col-md-4 mb-3">
                            <div class="card img-hover shadow-sm bg-body rounded">
                              <div class="img-holder">
                                <a href={{ url('project/view/'.$category['id']) }}>
                                  <img src="{{asset('storage/'.$category['banner']);}} " loading="lazy">
                                </a>
                              </div>
                              <div class="card-body text-dark">
                                <h4 class="card-title">{{$category['title']}}</h4>
                                  <p class="card-text text-truncate" style="max-height: 10vh">{{$category['description']}}</p>
                              </div>
                              <div class="d-flex justify-content-between p-3">
                                  <div class="btn-group">
                                      <a type="button" href={{ url('project/view/'.$category['id']) }} class="btn btn-sm btn-outline-secondary">View</a>
                                      
                                  </div>
                                  <div class="text-muted">{{$category['date']}}</div>
                              </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                  @else
                  <div class="row">
                    <h2>Popular Projects</h1>
                      @foreach($project['popular'][0] as $index => $category)
                      @if($index<3) 
                        <div class="col-md-4 mb-3">
                          <div class="card img-hover shadow-sm bg-body rounded">
                            <div class="img-holder">
                              <a href={{ url('project/view/'.$category['id']) }}>
                                <img src="{{asset('storage/'.$category['banner']);}} " loading="lazy">
                              </a>
                            </div>
                            <div class="card-body text-dark">
                              <h4 class="card-title">{{$category['title']}}</h4>
                                <p class="card-text text-truncate" style="max-height: 10vh">{{$category['description']}}</p>
                            </div>
                            <div class="d-flex justify-content-between p-3">
                                <div class="btn-group">
                                    <a type="button" href={{ url('project/view/'.$category['id']) }} class="btn btn-sm btn-outline-secondary">View</a>
                                    
                                </div>
                                <div class="text-muted">{{$category['date']}}</div>
                            </div>
                          </div>
                      </div>
                      @endif
                      @endforeach
                  </div><br>
                  @endif
                      
                  </div>
                </div>
            </div>
            
            </button>
          </div>
        </div>
      </div>
    </section>
    

  <!-- Vertically centered modal -->
<div class="modal fade" id="amtModal" tabindex="-1" aria-labelledby="amtModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-3" id="amtModalLabel">Donation Modal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <div>
          <label for="FormControlAmt" class="fs-5 form-label">Enter donation amount: </label>
          <input type="number" class="form-control" id="FormControlAmt">
          <label for="FormControlAmt" id = "err_donation" class = "error"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id = "AmtDonate">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Vertically centered modal -->
<div class="modal fade" id="displayAmt" tabindex="-1" aria-labelledby="displayAmt" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-3" id="displayAmt">Donation Modal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <div class="mb-3">
          <h4 class="text-warning h2"><i class="fa-solid fa-triangle-exclamation"></i> </h4>
          <h5>There will be a tax of 2.5% for PayMongo services</h5>
        </div>
        <div class="mb-3">
          <label for="FormControldisplayAmt" class="fs-5 form-label">Total donation amount: </label>
          <input type="number" class="form-control" id="FormControldisplayAmt" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-target="#amtModal" data-bs-toggle="modal">Return</button>
        <button type="button" class="tier-button btn btn-success" data-projectId={{$project['id']}}>Confirm</button>
      </div>
    </div>
  </div>
</div>
  


@endsection