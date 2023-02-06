@extends('layouts.default')

@section('content')
<x-styles.defnav/>
<style>
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active  {
    transition: background-color 5000s;
    -webkit-text-fill-color: #fff !important;
}
</style>
  <section id="header-hero" class="header-hero-size hero2 hero-dark p2">
      <div class="hero__container">
        <h1 class="hero__title fadeOut">Contact Us</h1>
        <hr class="hero__divider">
      </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="card p-5 mb-5 shadow" style="background-color:#1f4260; border:2px solid white">
              <h3 class="text-center mb-4">Contact Us</h3>
              <form autocomplete="off" >
                <div class="form-floating mb-3 form-border">
                  <input type="text" id="floatingInput" autocomplete="off" class="form-control text-light shadow-none border-0 bg-transparent" placeholder="John Doe">
                  <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating form-border mb-3">
                  <input type="email" id="floatingInput" autocomplete="off" class="form-control text-light shadow-none border-0 bg-transparent " placeholder="example@email.com">
                  <label for="floatingInput">Email</label>
                </div>
                <div class="form-group form-border mb-3">
                  <textarea autocomplete="off" style="height:100%" class="form-control text-light shadow-none border-0 bg-transparent" rows="5" placeholder="Message"></textarea>
                
                </div>
                <button type="submit" style="background-color:#17b79c" class="btn text-light btn-block mt-5">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
  <div class="divider"></div>
  
    <x-styles.footer/>
@endsection