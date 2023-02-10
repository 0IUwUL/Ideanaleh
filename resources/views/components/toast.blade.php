<div aria-live="polite" aria-atomic="true" class="toast-container align-items-center mt-5">
    <div class="DevToast toast" role="alert" id = "DevToast" aria-live="assertive" aria-atomic="true" data-status={{Session::get('toast')}}>
      <div class="toast-header">
        <strong class="me-auto">System</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-dark text-white d-flex justify-content-start">
        {{Session::get('message')}}
      </div>
    </div>
</div>