@extends('template.body')
@section('content')
    <div class="main-container">
      @include('template.header')

        <div class="author-content-area">
            <div class="left-part">
                @include('template.menu')
            </div>
            <div class="middle-part pt-3">
                <h3>Revision</h3>
                <ul>
                    <li><a href="">Submissions Needing Revision  (0)</a></li>
                    <li><a href="">Revisions Sent Back to Author  (0)</a></li>
                    <li><a href="">Incomplete Submissions Being Revised  (0)</a></li>
                    <li><a href="">Revisions Waiting for Author's Approval  (0)</a></li>
                    <li><a href="">Revisions Being Processed  (0)</a></li>
                    <li><a href="">Declined Revisions  (0)</a></li>
                </ul>

                <h3>Completed</h3>
                <ul>
                    <li><a href="">Submissions with a Decision  (0)</a></li>
                    
                </ul>
            </div>
            <div class="right-part">
                <h3>Author webinars</h3>
                <p>We've finished our Author webinar series for 2023 and we're preparing new content for 2024 when we will relaunch the series. Until then, you'll find our latest Author webinar recordings here.</p>

                <p class="empty-border"></p>
                <h3>Language Editing Services</h3>
                <p>Ensure your work is written in correct English. Learn more & get started.</p>

                <h3>Video guides & support articles </h3>
                <ul>
                    <li><a href="">Author submission process overview and support article</a></li>
                    <li><a href="">Checking the status of your submission</a></li>
                    <li><a href="">Co-author verification FAQs</a></li>
                    <li><a href="">Preparing to submit your revision</a></li>
                    <li><a href="">Submitting your revision and supporting article</a></li>
                    <li><a href="">Using the “Track your submission” service</a></li>
                    <li><a href="">
                        Submitting a LaTeX file in Editorial Manager</a></li>
                    <li><a href="">Article Transfer Service (ATS) author overview</a></li>
                </ul>
            </div>
        </div>

        @if(session()->has('msg'))
        {{session('msg')}}
        <!-- <script>
            alert(hi);
            Swal.fire({
            title: "Good job!",
            text: "{{session('msg')}}",
            icon: "success"
            });
        </script> -->
        @endif
       
    </div>

    @include('template.header')
@endsection()