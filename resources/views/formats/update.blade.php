<div class="accordion-item">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#info-update-acord-1" aria-expanded="false" aria-controls="info-update-acord-1">
        <h4 class="accordion-header" id="update-acord-heading-1">
            {{$update['title']}} ({{date('F d, Y', strtotime($update['created_at']))}})
        </h4>
    </button>
    <div id="info-update-acord-1" class="accordion-collapse collapse"
    aria-labelledby="update-acord-heading-1" data-bs-parent="#info-update-accordion">
        <div class="accordion-body py-2">
            <p>{{$update['description']}}</p>
        </div>
    </div>
</div>