<form method="post" action="{{route('google-register-user')}}" accept-charset="UTF-8" id="GoogleForm">
@csrf         
<div class="modal fade" id="SignUpModal5" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="SignUpModalToggle5" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="SignUpModalToggle5">Sign Up</h1>
        </div>
        <div class="modal-body p-4">
            <div class="d-flex justify-content-center display-6 text-dark">
                  Category Selection
            </div>  
              <div class="mt-3">
                  <label class="form-label">Choose preffered categories (3 at least): </label>
                  <label class="text-danger me-1">*</label>
                  <div class="input-group mb-3 d-flex justify-content-evenly">
                    @foreach(config('category')[0] as $category)
                    <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value = '{{$category}}' aria-label="Checkbox for {{$category}}"> {{$category}}
                    </div>
                    @endforeach
                  </div>
                  <label for="GCategs[]" class="error"></label>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success Gnext">Next</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="SignUpModal6" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="SignUpModalToggle6" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="SignUpModalToggle6">Sign Up</h1>
        </div>
        <div class="modal-body p-4">
            <div class="d-flex justify-content-center display-5 text-dark">
              Follow Projects under your preferences
            </div>  
            <div class="warn d-flex justify-content-center display-6 text-info">
              Please select at least 3 projects to follow
            </div>
            <div class="mt-5" id = "GCategory_content">
            </div>
            <label for="Followed[]" class="error"></label>
            <div class="row mt-3">
              <div class="row">
                <div class="col-12">
                    <input type="checkbox" name="agree_terms" required>
                    <label>
                      I have read, understood, and agree to <i>Ideanaleh</i> <a href={{url('/terms-and-conditions')}} target="_blank">terms and conditions</a>
                    </label>
                    <div class="row p-3">
                      <label for="agree_terms" class="error">Your error message will be display here.</label>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                    <input type="checkbox" name="agree_privacy" required>
                    <label>
                      I have read, understood, and agree to <i>Ideanaleh</i> <a href={{url('/privacy-policy')}} target="_blank">privacy policy</a>
                    </label>
                    <div class="row p-3">
                      <label for="agree_privacy" class="error">Your error message will be display here.</label>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-target="#SignUpModal5" data-bs-toggle="modal">Back</button>
          <button type="submit" class="btn btn-success" id="Gsubmit">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>