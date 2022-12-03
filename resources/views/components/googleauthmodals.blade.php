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
                      <div class="input-group-text Gcategs">
                          <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value = 'Games' aria-label="Checkbox for Games"> Games
                      </div>
                      <div class="input-group-text Gcategs">
                          <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Business" aria-label="Checkbox for Business"> Business
                      </div>
                      <div class="input-group-text Gcategs">
                          <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="AI" aria-label="Checkbox for AI"> AI
                      </div>
                      <div class="input-group-text Gcategs">
                          <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Agriculture" aria-label="Checkbox for Agriculture"> Agriculture
                      </div>
                      <div class="input-group-text Gcategs">
                          <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Music" aria-label="Checkbox for Music"> Music
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="IOT" aria-label="Checkbox for IOT"> IOT
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Communication" aria-label="Checkbox for Communication"> Communication
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Medical" aria-label="Checkbox for Medical"> Medical
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Transportation" aria-label="Checkbox for Transportation"> Transportation
                      </div> 
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Education" aria-label="Checkbox for Education"> Education
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Security" aria-label="Checkbox for Security"> Security
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="VR/AR" aria-label="Checkbox for VR/AR"> VR/AR
                      </div>
                      <div class="input-group-text Gcategs">
                        <input class="form-check-input mt-0" type="checkbox" name="GCategs[]" value="Others" aria-label="Checkbox for Others"> Others
                      </div>
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
            <label for="GFollowed[]" class="error"></label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-target="#SignUpModal5" data-bs-toggle="modal">Back</button>
          <button type="submit" class="btn btn-success" id="Gsubmit">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>