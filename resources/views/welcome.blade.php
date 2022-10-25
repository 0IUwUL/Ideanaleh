<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased">
        <x-defhead/>
        @if(session()->has('message'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger col-6 d-flex justify-content-between" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif        
        <main>
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
        <!-- <div class="col-6 text-right">
          <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
            <i class="fa fa-arrow-left"></i>
          </a>
          <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
            <i class="fa fa-arrow-right"></i>
          </a>
        </div>  -->


        
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
          <div class="carousel-btn">
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          
          </button>
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
        <a href="#" class="hero__btn hero__btn--light btn">Get Started!</a>
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

    </body>
</html>
