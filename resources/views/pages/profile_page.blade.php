@extends('layouts.default')

@section('content')
<x-styles.defnav/>

<div class="container-fluid">
    <div class="row profile_page d-flex justify-content-evenly">
        <div class="col-sm-5 d-none d-sm-block left_block">
            <div class="row d-flex justify-content-center pt-3">
                <img src={{asset('storage/'.$details['own']['icon'])}} class="profile_icon">
            </div>
            <div class="row my-5 prof_title">
                Projects:<hr>
                <div class="profile_Fprojects prof_title">
                    <div class="row">
                        <span class="row_titles">Following:</span>
                        <div class="prof_projTitlesFollow">
                            @foreach($details['followed'] as $item)
                                <a href={{url('project/view/'.$item['id'])}}><span class="prof_projTitle">{{$item['title']}}</span></a>
                            @endforeach
                        </div>
                    </div>
                    @if(count($details) > 2)
                        <div class="row mt-3 prof_title">
                            <span class="row_titles">Supporting:</span>
                            <div class="prof_projTitlesSupport">
                                    @foreach($details['supported'] as $item)
                                        <a href={{url('project/view/'.$item['id'])}}><span class="prof_projTitle">{{$item['title']}}</span></a>
                                    @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 right_block">
            <div class="row d-flex justify-content-center d-block d-sm-none">
                <img src={{asset('storage/'.$details['own']['icon'])}} class="profile_icon">
                <h3 class="text-center mt-3">{{$details['own']['Lname'] .', '. $details['own']['Fname'] .' '. $details['own']['Lname']}}</h3>
                <h6 class="text-center">{{$details['own']['dev_mode']}}</h6>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col">
                    <h3 class="d-none d-sm-block">{{$details['own']['Lname'] .', '. $details['own']['Fname'] .' '. $details['own']['Lname']}}</h3>
                    <h6 class="d-none d-sm-block {{$details['own']['status']}}">{{$details['own']['dev_mode']}}</h6>
                </div>
                <div class="col d-print-inline-block text-end">
                    <button type="button" class="btn btn-danger fs-5" data-bs-toggle="modal" data-bs-target="#ReportModal"><i class="fa-solid fa-triangle-exclamation"></i></button>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link" role="tab" aria-selected="true">About</a>
                </div>
                <div class="tab-content">
                    <div class="row basic_user">
                        <h4>Basic Information</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-lg-3 col-form-label fs-5">Email:</label>
                            <div class="col d-flex align-self-center">
                                <span>{{$details['own']['email']}}</span>
                            </div>
                        </div>
                    </div>
                    @if ($details['own']['project'] != null)
                        <div class="row basic_proj">
                            <h4>Project Invovled:</h4>
                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-lg-3 col-form-label fs-5">Title:</label>
                                <div class="col d-flex align-self-center">
                                    <span>{{$details['own']['project']['title']}}</span>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <a class="btn btn-primary" href={{url('project/view/'.$details['own']['project']['id'])}} role="button">Visit Project</a>
                                </div>
                                
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row my-5 prof_title d-block d-sm-none">
                    Projects:<hr>
                    <div class="profile_Fprojects prof_title">
                        <div class="row">
                            <span class="row_titles">Following:</span>
                            <div class="prof_projTitles">
                                @foreach($details['followed'] as $item)
                                    <a href={{url('project/view/'.$item['id'])}}><span class="prof_projTitle">{{$item['title']}}</span></a>
                                @endforeach
                            </div>
                        </div>
                        @if(count($details) > 2)
                        <div class="row mt-5 prof_title">
                            <span class="row_titles">Supporting:</span>
                            <div class="prof_projTitles">
                                    @foreach($details['supported'] as $item)
                                        <a href={{url('project/view/'.$item['id'])}}><span class="prof_projTitle">{{$item['title']}}</span></a>
                                    @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ReportModal" tabindex="-1" aria-labelledby="ReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ReportModalLabel">Report Form</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="mb-3">
                    <label for="ReportModalFormControl1" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="ReportModalFormControl1" required>
                </div>
                <div class="mb-3">
                    <label for="ReportModalFormTextarea1" class="form-label">Report in Detail</label>
                    <textarea class="form-control" id="ReportModalFormTextarea1" rows="3" required></textarea>
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

@endsection