
<ul>
    @if(session('type')=='author')
    <li class="{{ Request::routeIs('dashboard') ? 'menuactive' : '' }}">
        <a href="{{route('dashboard')}}">Author Main Page</a></li>
    <li class="{{ Request::routeIs('author1') ? 'menuactive' : '' }}">
        <a href="{{url('/author-submit')}}">Submit New Manuscript</a></li>
    <li class="{{ Request::routeIs('editor4') ? 'menuactive' : '' }}">
        <a href="{{url('/incomplete-submission/user='.session('id'))}}">Submissions Need Revision</a></li>
    <li class="{{ Request::routeIs('author3') ? 'menuactive' : '' }}">
        <a href="">Incomplete Submissions</a></li>
    <li class="{{ Request::routeIs('author4') ? 'menuactive' : '' }}">
        <a href="{{url('/author-incomplete-submission')}}"><a href="{{url('/author-pending-paper')}}">Submissions Waiting for Editor Approval</a></li>
    <li class="{{ Request::routeIs('author5') ? 'menuactive' : '' }}">
        <a href="{{url('/processed-paper/user='.session('id'))}}">Submissions Being Processed</a></li>
   
    @elseif(session('type')=='editor')
    <li class="{{ Request::routeIs('editor1') ? 'menuactive' : '' }}">
        <a href="{{url('/editor-dashboard')}}">Dashboard</a></li>
    <li class="{{ Request::routeIs('editor2') ? 'menuactive' : '' }}">
        <a href="{{url('/editor-pending-paper')}}">Papers Need Review</a></li>
    <li class="{{ Request::routeIs('editor3') ? 'menuactive' : '' }}">
        <a href="{{url('/reviewers')}}">Reveiwers</a></li>
    <li class="{{ Request::routeIs('editor4') ? 'menuactive' : '' }}">
        <a href="{{url('/incomplete-submission/'.session('user'))}}">Submissions in Revission</a></li>
    <li class="{{ Request::routeIs('editor') ? 'menuactive' : '' }}">
        <a href="">Submissions Waiting for Approval</a></li>
    <li class="{{ Request::routeIs('editor') ? 'menuactive' : '' }}">
        <a href="">Submissions after Edit</a></li>
    @endif
</ul>
