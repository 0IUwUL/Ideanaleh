@extends('layouts.default')

@section('content')
<x-styles.defnav/>
   
  <section id="header-hero" class="hero hero-dark p1">
      <div class="hero__container">
        <h1 class="hero__title">A Philippine-Based Crowdfunding Platform</h1>
        <hr class="hero__divider">
        <p class="hero__text">
          Start your Clever Innovative Projects with hopes of Bringing Joy and Excitement for Everyone
        </p>
        <a href="#" class="hero__btn hero__btn--dark btn">Find Out More</a>
      </div>
  </section>
  
  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-3">Popular Projects </h3>
        </div>
        <div class="container align-items-center justify-content-center text-center">
          <div class="col-12 text-right">
             <a class="btn btn-primary mb-3 mr-1" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
               <i class="fa fa-arrow-left"></i>
             </a>
             <a class="btn btn-primary mb-3 " type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
               <i class="fa fa-arrow-right"></i>
             </a>
           </div> 
         </div>


        
        <!-- Left and right controls/icons -->
 
        <div class="col-12">
          <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="card shadow-sm bg-body rounded">
                        <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                        <div class="card-body text-dark">
                           <h4 class="card-title">Title</h4>
                            <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p>
                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                
                            </div>
                            <div class="text-muted">9 mins</div>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <div class="card shadow-sm bg-body rounded">
                        <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                        <div class="card-body text-dark">
                           <h4 class="card-title">Title</h4>
                            <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p>
                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                
                            </div>
                            <div class="text-muted">9 mins</div>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <div class="card shadow-sm bg-body rounded">
                        <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                        <div class="card-body text-dark">
                           <h4 class="card-title">Title</h4>
                            <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p>
                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                
                            </div>
                            <div class="text-muted">9 mins</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="carousel-item">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <div class="card shadow-sm bg-body rounded">
                      <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                      <div class="card-body text-dark">
                         <h4 class="card-title">Title</h4>
                          <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                              lead-in to additional content. This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.</p>
                      </div>
                      <div class="d-flex justify-content-between p-3">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              
                          </div>
                          <div class="text-muted">9 mins</div>
                      </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card shadow-sm bg-body rounded">
                      <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                      <div class="card-body text-dark">
                         <h4 class="card-title">Title</h4>
                          <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                              lead-in to additional content. This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.</p>
                      </div>
                      <div class="d-flex justify-content-between p-3">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              
                          </div>
                          <div class="text-muted">9 mins</div>
                      </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card shadow-sm bg-body rounded">
                      <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                      <div class="card-body text-dark">
                         <h4 class="card-title">Title</h4>
                          <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                              lead-in to additional content. This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.</p>
                      </div>
                      <div class="d-flex justify-content-between p-3">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              
                          </div>
                          <div class="text-muted">9 mins</div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <div class="card shadow-sm bg-body rounded">
                      <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                      <div class="card-body text-dark">
                         <h4 class="card-title">Title</h4>
                          <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                              lead-in to additional content. This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.</p>
                      </div>
                      <div class="d-flex justify-content-between p-3">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              
                          </div>
                          <div class="text-muted">9 mins</div>
                      </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card shadow-sm bg-body rounded">
                      <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                      <div class="card-body text-dark">
                         <h4 class="card-title">Title</h4>
                          <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                              lead-in to additional content. This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.</p>
                      </div>
                      <div class="d-flex justify-content-between p-3">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              
                          </div>
                          <div class="text-muted">9 mins</div>
                      </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card shadow-sm bg-body rounded">
                      <img src="https://dummyimage.com/360x225/4f4a4f/dddee6&text=Thumbnail">
                      <div class="card-body text-dark">
                         <h4 class="card-title">Title</h4>
                          <p class="card-text text-truncate" style="max-height: 10vh">This is a wider card with supporting text below as a natural
                              lead-in to additional content. This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.This is a wider card with supporting text below as a natural
                              lead-in to additional content.</p>
                      </div>
                      <div class="d-flex justify-content-between p-3">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>  
                          </div>
                          <div class="text-muted">9 mins</div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
  
  <section id="about" class="hero1 hero-dark">
    <div class="hero__container">
        <h1 class="hero__title">We've got what you need!</h1>
        <hr class="hero__divider">
        <p class="hero__text">
          A Platform that serves to help Creators, Inventors, Innovators to Kickstart their Dream Projects.
        </p>
        @if ($mode)
        <a href="{{ route('project-create') }}" class="hero__btn hero__btn--light btn">Get Started!</a>
        @else
        <button class="hero__btn hero__btn--light btn" id = "modeToast" data-id = {{session('loginId') ? 'logI' : 'logO'}} data-mode = {{$mode}}>Get Started!</a>
        @endif
        
      </div>
  </section>

  <section id="header-hero" class="hero hero-dark p2">
    <div class="hero__container">
      <h1 class="hero__title">Back Innovative Projects, <br> Join Our Ride </h1>
      <hr class="hero__divider">
      <p class="hero__text">
        Idiyanaleh is your source for creative breakthroughs in technology, design, and other fields, frequently with special advantages and price for early Donators. Support a campaign, share your ideas and feedback with the project team, and share in the joys and risks of bringing innovative technologies to reality.
      </p>
    </div>
  </section>

  <section id="services" class="hero pb-5">
    <div class="hero__container">
      <h1 class="hero__title">At your service</h1>
      <hr class="hero__divider">
      <div class="row">
        <div class="icon-card icon-card--large col-lg-3 col-md-6">
          <i class="icon-card__icon fa-solid fa-code" aria-hidden="true"></i>
          <h2 class="icon-card__title">Create Opportunities</h2>
          <p class="icon-card__text">Your Ideas may Create Innovative Technology that can Change the World</p>
        </div>
        
        <div class="icon-card icon-card--large col-lg-3 col-md-6">
          <i class="icon-card__icon fa-solid fa-flag-checkered" aria-hidden="true"></i>
          <h2 class="icon-card__title">Start your Project</h2>
          <p class="icon-card__text">Create Multiple Projects that are be Entertaining and Useful </p>
        </div>
        
        <div class="icon-card icon-card--large col-lg-3 col-md-6">
          <i class="icon-card__icon fa-solid fa-globe" aria-hidden="true"></i>
          <h2 class="icon-card__title">A Local Platform for PH</h2>
          <p class="icon-card__text">Promotes Philippine Local Developers & Innovators</p>
        </div>
        
        <div class="icon-card icon-card--large col-lg-3 col-md-6">
          <i class="icon-card__icon fa-solid fa-handshake-angle"></i>
          <h2 class="icon-card__title">Made with Love</h2>
          <p class="icon-card__text">A Platform that Hope and Brings a Bright & Fruitful Future</p>
        </div>
      </div>
    </div>
  </section>

  <div aria-live="polite" aria-atomic="true" class="toast-container p-3 align-items-center mt-5">
    <div class="DevToast toast" role="alert" id = "DevToast" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">System</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-dark text-white d-flex justify-content-start">
      </div>
    </div>
  </div>  
@endsection