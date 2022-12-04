<div class="accordion-item">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#info-update-acord-{{$update['id']}}" aria-expanded="false" aria-controls="info-update-acord-1">
        <h4 class="accordion-header d-flex" >
            <div id="update-title-{{$update['id']}}">{{$update['title']}}</div>
            <div id="update-date-{{$update['id']}}">{{'('.date('F d, Y', strtotime($update['created_at'])).')'}}</div>
        </h4>
        @if(Auth::check() && Auth::user()->id == $update['dev_id'])
        <div class="ms-auto dropdown">
            <a class="btn circle ms-auto align-self-center " data-bs-toggle="dropdown" aria-expanded="false" disabled><i class="fa-solid fa-ellipsis"></i></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item editUpdate" type="button" data-bs-toggle="modal" data-bs-target="#updateEditModal" data-id={{$update['id']}}>Edit</a></li>
                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></li>
            </ul>
        </div>
        @endif
    </button>
    <div id="info-update-acord-{{$update['id']}}" class="accordion-collapse collapse"
    aria-labelledby="update-acord-content-{{$update['id']}}" data-bs-parent="#info-update-accordion">
        <div class="accordion-body py-2" id="update-desc-{{$update['id']}}">
            {{$update['description']}}
        </div>
    </div>
</div>