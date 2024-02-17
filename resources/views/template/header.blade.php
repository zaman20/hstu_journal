<div class="header-area">
    <div class="left-part">
        <h2>ScholarTrack </h2>
    </div>
    <div class="right-part">
        @if(session()->has('user'))
        <a href="">{{session('user')}}</a>
        @endif
        <a href="{{url('/logout')}}">Log Out</a>
    </div>
</div>
