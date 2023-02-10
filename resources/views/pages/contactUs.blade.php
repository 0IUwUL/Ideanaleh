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
              <form autocomplete="off" method="POST" action="{{route('help.store')}}">
                @csrf
                <div class="form-floating mb-3 form-border">
                  <input type="text" id="floatingInput" name="name" autocomplete="off" class="form-control text-light shadow-none border-0 bg-transparent" placeholder="John Doe" required>
                  <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating form-border mb-3">
                  <input type="email" id="floatingInput" name="email" autocomplete="off" class="form-control text-light shadow-none border-0 bg-transparent " placeholder="example@email.com" required>
                  <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating form-border mb-3">
                  <input type="text" id="floatingInput" name="subject" autocomplete="off" class="form-control text-light shadow-none border-0 bg-transparent " placeholder="Subject" required>
                  <label for="floatingInput">Subject</label>
                </div>
                <div class="form-group form-border mb-3">
                  <textarea autocomplete="off" style="height:100%" name="content" class="form-control text-light shadow-none border-0 bg-transparent" rows="5" placeholder="Message"></textarea>
                
                </div>
                <button type="submit" style="background-color:#17b79c" class="btn text-light btn-block mt-5">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
  <div class="divider"></div>
  <div aria-live="polite" aria-atomic="true" class="toast-container align-items-center mt-5">
    <div class="DevToast toast" role="alert" id = "ContactToast" aria-live="assertive" aria-atomic="true" data-status={{Session::get('toast')}}>
      <div class="toast-header">
        <strong class="me-auto">System</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-dark text-white d-flex justify-content-start">
      </div>
    </div>
  </div>
  <x-styles.footer/>
@endsection