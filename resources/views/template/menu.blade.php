
<ul>
    @if(session('type')=='author')
    <li><a href="{{url('/author-submit')}}">Submit New Manuscript</a></li>
    <li><a href="">Submissions Sent Back to Author</a></li>
    <li><a href="">Incomplete Submissions</a></li>
    <li><a href="{{url('/author-pending-paper')}}">Submissions Waiting for Editor Approval</a></li>
    <li><a href="">Submissions Being Processed</a></li>
    <li><a href="{{url('/author-dashboard')}}">Author Main Page</a></li>
    @elseif(session('type')=='editor')
    <li><a href="{{url('/editor-pending-paper')}}">Papers Need Review</a></li>
    <li><a href="">Reveiwers</a></li>
    <li><a href="{{url('/incomplete-submission')}}">Incomplete Submissions</a></li>
    <li><a href="">Submissions Waiting for Approval</a></li>
    <li><a href="">Submissions after Edit</a></li>
    @endif
</ul>
