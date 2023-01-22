<div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
    <div class="py-5 px-lg-5" id="info-campaign-accordion">
      {{-- Note to fronend devs, pls fix/format ty. -RamonDev --}}
      <p class="text-center">{!!$project['story']!!}</p>
      <div class="d-flex justify-content-center">
        @if($project['yt_link'])
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$project['yt_link']}}" 
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
        @endif
      </div>
      <p class="text-center">{{$project['target_date']}}</p>
      <a href={{url('profile/'.$project['dev']['id'])}} class="row d-flex justify-content-center text-decoration-none text-dark dev_details">
        <div class="row col-11 col-sm-10 col-lg-11 col-xl-9 col-xxl-8 border border-3 border-secondary d-flex justify-content-evenly p-3 rounded">
          <div class="col-4">
            {{-- <img src={{asset('storage/avatars/default.png')}} class="img-fluid rounded"> --}}
            <img src={{asset('storage/'.$project['dev']['icon'])}} class="img-fluid rounded">
          </div>
          <div class="col-8 d-flex align-self-center">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fs-4 fw-bolder fst-italic">Name: </td>
                  <td class="align-middle fw-semibold fs-5">{{$project['dev']['Lname'] .', '. $project['dev']['Fname'] .' '. $project['dev']['Lname']}}</td>
                </tr>
                <tr>
                  <td class="fs-4 fw-bolder fst-italic">Email: </td>
                  <td class="align-middle fw-semibold">{{$project['dev']['email']}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </a>
    </div>
  </div>