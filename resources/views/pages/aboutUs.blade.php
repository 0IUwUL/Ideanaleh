@extends('layouts.default')

@section('content')
<x-styles.defnav/>
<style>
p{
  text-indent:4%;
}
.lists {
  text-indent:8%;
  background-color:none;
}
b{
  color:black
}
.textContainer{
  margin-top:2vh;
  margin-right:1.8em;
}

.title{
  font-size:1.3rem;
  font-weight: 500;
}
.text{
  color:rgb(105, 105, 105)
}
</style>

  <section id="header-hero" class="header-hero-size hero2 hero-dark p2">
      <div class="hero__container">
        <h1 class="hero__title fadeOut">About Us</h1>
        <hr class="hero__divider">
      </div>
      <div class="container">
        <div class="row">
            <div class="section"></div>
              <div class="container-fluid">
                <div class="box color-green fadeOut">
                  <div class="box-content">
                    Ideanaleh is a platform that bridges the gap between creative visionaries and those who believe in their ideas. It's a place where people can come together to bring new and innovative projects to life. Whether you're an artist, designer, inventor, or entrepreneur, Ideanaleh gives you the opportunity to share your ideas with the world and secure the funding you need to bring them to life. With Ideanaleh, your dream projects can become a reality.

                  </div>
                </div>
              </div>
            </div>
        </div>
      
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