@extends('layouts.projectView')

<x-styles.defnav/>

@section('content')

<!-- Product Section -->

<section class="container-fluid products py-5">
    <div class="container">

        <!-- mobile -->
      <h1 class="product-name product-mobile-name my-5 d-block d-lg-none text-center">Title Mobile View</h1>
      <div class="tags product-mobile-name d-lg-none my-3 d-block text-center">
        <h6>tags: RPG, Action, Hack n Slash</h6>
      </div>

      <div class="row">
        <div class="col-md-6 gx-5">
          <div class="product-media">
            <div class="product-media-container">
              <div class="images-carousel owl-carousel owl-theme">
                <div class="item">
                  <img src="https://picsum.photos/1000/1260" alt="">
                </div>
                <div class="item">
                  <img src="https://picsum.photos/1000/1280" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-info">

                    <!-- desktop -->
                    <!-- if button centered add </div> here, else put div before section closing-->
                    <h1 class="product-name my-4 d-lg-block d-none">Title Desktop View</h1>
                    <div class="tags my-4 d-lg-block d-none">
                        <h6>tags: RPG, Action, Hack n Slash</h6>
                    </div>
                    <!-- Progress Bars -->
                    <div class="progress-bars row g-0 mt-3">
                        <div class="progress mx-4 mt-5" style="width: 90%;">
                            <div class="progress-bar" role="progressbar" style="width: 25%; height:20px; font-weight:bold;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <p class="product-price mx-4 mt-2" style>PHP 0.00 / 60000.00 Target Donations</p>
                        <div class="progress mx-4" style="width: 90%;">
                            <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 25%; height:20px; font-weight:bold;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <p class="product-price mx-4 mt-2 mb-4" style>PHP 0.00 / 30000.00 Milestone Donations</p>
                    </div>


                    <!-- Project Summary Description-->
                <div class="product-description d-lg-block d-none mt-3 mb-4">
                    <p>Lorem Desktop, ipsum dolor sit amet consectetur adipisicing elit. Officia quos nulla ea voluptates quasi quam dolore optio ad omnis dolorum doloremque mollitia earum ab aut quod, quaerat qui, maiores esse laboriosam, minus a illum laborum dignissimos? Eaque, a suscipit vitae velit aspernatur, sed hic voluptatem vero temporibus ullam expedita eos, maxime numquam voluptates delectus itaque! Eius omnis neque dolorem doloremque laboriosam ratione dignissimos amet totam aperiam autem nostrum animi fugiat recusandae eos quasi rerum, temporibus eligendi molestiae, voluptate perferendis! Suscipit voluptas unde corporis maxime, libero sunt quas blanditiis omnis quos tempore autem velit molestiae distinctio, necessitatibus consectetur praesentium placeat? Doloribus.</p>
                </div>
            </div>
          
            <div class="product-form py-4 justify-content-center">
                <div class="col-lg-auto text-center" >
                    <button type="submit" class="btn add-to-cart w-50"><span class="fa fa-cart-shopping"></span>&nbsp Support the Project</button>
                </div>  
            </div>
            
            </div>
        </div>
      </div>
      <div class="product-description d-block d-lg-none text-center my-5">
        <p>Lorem ipsum Mobile dolor sit amet consectetur, adipisicing elit. Quis ullam reprehenderit nulla iure modi assumenda necessitatibus rerum temporibus! Velit sed totam dolor in corrupti, quibusdam eos non accusantium aspernatur consectetur.
        </p>
        <a>Read More</a>
      </div>
    </div>
  </section>
<!-- Product Section end -->


  <section class="container-fluid info bg-brown-medium px-0">
    <div class="container-lg py-5 px-0">
      <h2 class="text-center title my-3 my-md-4 my-lg-5 px-2 px-sm-0">Additional Product Information</h2>

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
              aria-selected="false">Update</button>
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
          <!-- tab item -->
          <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
            <div class="py-5 px-lg-5" id="info-campaign-accordion">
              <p class="text-center"> description of project (background of proj, img, etc)</p>
            </div>
          </div>
          <!-- tab item -->
          <div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab">
            <div class="accordion accordion-flush py-5 px-lg-5" id="info-update-accordion">
              <!-- accordion -->
              <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5  mb-4">
                <div class="accordion-item">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#info-update-acord-1" aria-expanded="true" aria-controls="info-update-acord-1">
                    <h3 class="accordion-header" id="update-acord-heading1">
                      Update 2.0
                    </h3>
                  </button>
                  <div id="info-update-acord-1" class="accordion-collapse collapse show"
                    aria-labelledby="update-acord-heading1" data-bs-parent="#info-update-accordion">
                    <div class="accordion-body py-2">
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem eius dolore veritatis cupiditate itaque natus velit dignissimos exercitationem. Atque pariatur voluptates ut repudiandae sapiente minima! Officiis libero modi corrupti neque.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- accordion -->
              <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5  mb-4">
                <div class="accordion-item">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#info-update-acord-2" aria-expanded="false" aria-controls="info-update-acord-2">
                    <h3 class="accordion-header" id="update-acord-heading2">
                      Update 1.0
                    </h3>
                  </button>
                  <div id="info-update-acord-2" class="accordion-collapse collapse"
                    aria-labelledby="update-acord-heading2" data-bs-parent="#info-update-accordion">
                    <div class="accordion-body py-2">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur hic omnis optio distinctio, a nobis, quam aliquam explicabo animi, eum sit! Recusandae maiores, eos adipisci vitae inventore ipsa neque incidunt.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- comments item tab -->
          <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
            <div class="py-5 px-lg-5" id="info-comments-accordion">
                <!-- Information -->
                <p class="text-center "> comments </p>
          </div>
          </div>
          <!-- Backers item tab -->
          <div class="tab-pane fade" id="pills-backers" role="tabpanel" aria-labelledby="pills-backers-tab">
            <div class="accordion accordion-flush py-5 px-lg-5" id="info-backers-accordion">
              <!-- Information -->
              <p class="text-center "> There are currently 10000 backers at this project</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">

        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <h2>Recommended Projects under this Category</h1>
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
            
            </button>
          </div>
        </div>
      </div>
    </section>
    
    </div>
  </section>
  


@endsection