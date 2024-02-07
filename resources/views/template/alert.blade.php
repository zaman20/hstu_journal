@if(session()->has('msg'))
<p class="alert alert-info">{{session('msg')}}</p>
@endif