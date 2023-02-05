@extends('layouts.default')

@section('content')
<x-styles.defnav/>
  <section id="header-hero" class="header-hero-size hero2 hero-dark p2">
      <div class="hero__container">
        <h1 class="hero__title fadeOut">Contact Us</h1>
        <hr class="hero__divider">
      </div>
      <html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .card {
        background-color: #fff;
        box-shadow: 0px 2px 5px #bbb;
        border-radius: 10px;
        animation: slide-up 0.5s ease;
      }
      @keyframes slide-up {
        from {
          transform: translateY(50%);
        }
        to {
          transform: translateY(0);
        }
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card p-5">
            <h3 class="text-center mb-4">Contact Us</h3>
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

      
  </section>
  <div class="divider"></div>
  <section id="header-hero" class="hero2 hero-dark p3">
    <div class="hero__container">
      <h1 class="hero__title fadeOut">Our Mission</h1>
      <hr class="hero__divider">
    </div>
    <div class="container">
      <div class="row">
          <div class="section"></div>
            <div class="container-fluid">
              <div class="box fadeOut">
                <div class="box-content">
                  At Ideanaleh, we're on a mission to ignite the spark of creativity and bring innovative ideas to life. We believe that everyone has the potential to make a difference and change the world. Our platform provides a platform for creative visionaries to share their ideas and secure the funding they need to turn their dreams into reality. Join us as we embark on a journey to inspire and support the next generation of game-changers and trailblazers in technology.
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    <div class="divider"></div>
    <section id="header-hero" class="hero2 hero-dark p4">
      <div class="hero__container">
        <h1 class="hero__title fadeOut">Our Team</h1>
        <hr class="hero__divider">
      </div>
      <div class="container profile-container">
        <div class="row">
          <div class="col-sm-6 col-md-6 mb-4">
            <div class="user-profile fadeOut">
              <img class="avatar" src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png">
              <div class="username">Lorem</div>
              <div class="bio">Founder</div>
              <div class="descriptions">designed and maintained websites</div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 mb-4">
            <div class="user-profile fadeOut">
              <img class="avatar" src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png">
              <div class="username">Ipsum</div>
              <div class="bio">Admins</div>
              <div class="descriptions">designed and maintained websites</div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 mb-4">
            <div class="user-profile fadeOut">
              <img class="avatar" src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png">
              <div class="username">Ipsum</div>
              <div class="bio">Admins</div>
              <div class="descriptions">designed and maintained websites</div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 mb-4">
            <div class="user-profile fadeOut">
              <img class="avatar" src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png">
              <div class="username">Ipsum</div>
              <div class="bio">Admins</div>
              <div class="descriptions">designed and maintained websites</div>
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <x-styles.footer/>
@endsection