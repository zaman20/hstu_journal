@extends('template.body')
@section('content')
    <div class="main-container">
      @include('template.header')

        <div class="author-content-area">
            <div class="left-part">
                @include('template.menu')
            </div>
            <div class="middle-part pt-3">
               
                <div class="row">
                    <a href="{{url('/editor-pending-paper')}}">
                        <div class="col-lg-5 btn btn-primary  m-2 p-4">
                            Waiting for Review
                        </div>

                    </a>
                    <a href="{{url('/submission-in-revission/user='.session('id'))}}">
                        <div class="col-lg-5 btn btn-warning  m-2 p-4">
                        In Revision
                        </div>
                    </a>
                    <a href="{{url('/reviewers')}}">
                        <div class="col-lg-5 btn btn-danger m-2 p-4">
                            Reviewer's
                        </div>
                    </a>
                    <a href="{{url('/processed-paper/user='.session('id'))}}">
                        <div class="col-lg-5 btn btn-info  m-2 p-4">
                            Processed Paper's
                        </div>
                    </a>
                </div>
               
            </div>
            
        </div>

      
       
    </div>

    @include('template.footer')
@endsection()