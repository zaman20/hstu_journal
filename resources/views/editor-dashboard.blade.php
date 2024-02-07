@extends('template.body')
@section('content')
    <div class="main-container">
      @include('template.header')

        <div class="author-content-area">
            <div class="left-part">
                @include('template.menu')
            </div>
            <div class="middle-part pt-3">
               

                <h3>Completed</h3>
               
            </div>
            
        </div>

      
       
    </div>

    @include('template.header')
@endsection()