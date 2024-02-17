
<ul>
    @if(session('type')=='author')
    <li class="{{ Request::routeIs('dashboard') ? 'menuactive' : '' }}">
        <a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="{{ Request::routeIs('author1') ? 'menuactive' : '' }}">
        <a href="{{url('/author-submit')}}">Submit New Manuscript</a></li>
    <li class="{{ Request::routeIs('editor5') ? 'menuactive' : '' }}">
        <a href="{{url('/incomplete-submission/user='.session('id'))}}">Incomplete Submissions</a></li>
    
    <li class="{{ Request::routeIs('author4') ? 'menuactive' : '' }}">
        <a href="{{url('/author-pending-paper')}}">Submissions Waiting for Editor Approval</a></li>
    <li class="{{ Request::routeIs('editor4') ? 'menuactive' : '' }}">
        <a href="{{url('/submission-in-revission/user='.session('id'))}}">Submissions Need Revision</a></li>
   
    
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
        <a href="{{url('/submission-in-revission/user='.session('id'))}}">Submissions in Revission</a></li>
    <li class="{{ Request::routeIs('author5') ? 'menuactive' : '' }}">
        <a href="{{url('/processed-paper/user='.session('id'))}}">Submissions In Review</a></li>
    <li class="{{ Request::routeIs('editor6') ? 'menuactive' : '' }}">
        <a href="">Submissions after Review</a></li>
    <li class="{{ Request::routeIs('editor7') ? 'menuactive' : '' }}">
        <a href="">Submissions Waiting for Approval</a></li>
   
    @endif
</ul>
