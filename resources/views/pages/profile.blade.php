@extends('layouts.default')

@section('content')
<x-styles.defnav/>

<div class="container-fluid">
    <div class="row profile_bg"></div>
    <div class="row profile_icon d-flex justify-content-center">
        <div class="col d-flex justify-content-center align-content-center">
            @if ($details['icon'])
                <img src={{asset('storage/'.$details['icon'])}} class={{$details['status']}} alt="Avatar icon">
            @else
                <img src={{asset('storage/avatars/default.png')}} class={{$details['status']}} alt="Avatar icon">
            @endif
        </div>
        <div class="row display_name">
            <h3>{{$details['Lname']}}, {{$details['Fname']}} {{$details['Mname']}}</h3>
            <h5 class={{$details['status']}}>{{$details['dev_mode']}}</h5>
        </div>
    </div>
    <div class="row profile_content">
        <ul class="nav nav-tabs d-flex justify-content-center p-0" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="follow-tab" data-bs-toggle="tab" data-bs-target="#follow-tab-pane" type="button" role="tab" aria-controls="follow-tab-pane" aria-selected="false">Following</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="support-tab" data-bs-toggle="tab" data-bs-target="#support-tab-pane" type="button" role="tab" aria-controls="support-tab-pane" aria-selected="false">Supporting</button>
            </li>
        </ul>
    </div>
    <div class="row profile_details">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="row mt-5 d-flex">
                    <div class="row">
                        <div class="col d-flex">
                            <h3 class="align-middle m-0 pe-3">Contacts:</h3>
                            @if (Auth::id() != $details['id'])
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ReportModal">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col d-flex">
                       
                        <div class="ps-5 mb-3 row">
                            <label for="staticEmail" class="col-3 col-form-label">Email</label>
                            <div class="col">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$details['email']}}>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if($details['project'] != NULL)
                        <h3>Project Involved:</h3>
                        <div class="row col col-sm-6 projects ps-5">
                            <a href={{url('project/view/'.$details['project']['id'])}} role = "button">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 title_img">
                                                <img src={{asset('storage/'.$details['project']['logo'])}} alt="project_logo">
                                                <h5 class="card-title d-flex justify-content-center text-center mt-2">{{$details['project']['title']}}</h5>
                                            </div>
                                            <div class="col-12 col-lg-6 content">
                                                <h5 class = "card-title">Category</h5>
                                                <p class="card-text ms-3">{{$details['project']['category']}}</p>
                                                <h5 class = "card-title">Description</h5>
                                                <p class="card-text ms-3">{{$details['project']['description']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="follow-tab-pane" role="tabpanel" aria-labelledby="follow-tab" tabindex="0">
                <div class="row g-5 mt-5 d-flex justify-content-center projects">
                    @foreach($details['pref']['followed'] as $item)
                        <div class="col-md-4">
                            <a href={{url('project/view/'.$item['id'])}} role = "button">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 title_img">
                                                <img src={{asset('storage/'.$item['logo'])}} alt="project_logo">
                                                <h5 class="card-title d-flex justify-content-center text-center mt-2">{{$item['title']}}</h5>
                                            </div>
                                            <div class="col-12 col-lg-6 content">
                                                <h5 class = "card-title">Category</h5>
                                                <p class="card-text ms-3">{{$item['category']}}</p>
                                                <h5 class = "card-title">Description</h5>
                                                <p class="card-text ms-3">{{$item['description']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="support-tab-pane" role="tabpanel" aria-labelledby="support-tab" tabindex="0">
                <div class="row g-5 mt-5 d-flex justify-content-center projects">
                    @if($details['pref']['supported'])
                        @foreach($details['pref']['supported'] as $item)
                            <div class="col-md-4">
                                <a href={{url('project/view/'.$item['id'])}} role = "button">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 title_img">
                                                    <img src={{asset('storage/'.$item['logo'])}} alt="project_logo">
                                                    <h5 class="card-title d-flex justify-content-center text-center mt-2">{{$item['title']}}</h5>
                                                </div>
                                                <div class="col-12 col-lg-6 content">
                                                    <h5 class = "card-title">Category</h5>
                                                    <p class="card-text ms-3">{{$item['category']}}</p>
                                                    <h5 class = "card-title">Description</h5>
                                                    <p class="card-text ms-3">{{$item['description']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                            <div class="col d-flex justify-content-center text-center fs-4">
                                None as of the moment.
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ReportModal" tabindex="-1" aria-labelledby="ReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-danger">
        <div class="modal-header bg-danger text-white">
          <h1 class="modal-title fs-5" id="ReportModalLabel">Report Form</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route("report-user")}}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="user_id" value={{$details['id']}} required>
                <div class="mb-3">
                    <label for="ReportModalFormControl1" class="form-label">Subject</label>
                    <input type="text" class="form-control" name="subject" id="ReportModalFormControl1" required>
                </div>
                <div class="mb-3">
                    <label for="ReportModalFormTextarea1" class="form-label">Report in Detail</label>
                    <textarea class="form-control" name="content" id="ReportModalFormTextarea1" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Report</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="divider"></div>
<x-styles.footer/>
@endsection