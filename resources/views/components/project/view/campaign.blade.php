<div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
    <div class="py-5 px-lg-5" id="info-campaign-accordion">
      {{-- Note to fronend devs, pls fix/format ty. -RamonDev --}}
      <p class="text-center">{{$project['description']}}</p>
      <div class="d-flex justify-content-center">
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$project['yt_link']}}" 
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
      </div>
      <p class="text-center">{{$project['yt_link']}}</p>
      <p class="text-center">{{$project['target_date']}}</p>
    </div>
  </div>