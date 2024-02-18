@extends('template.body')
@section('content')
<div class="main-container">
    @include('template.header')
    <div class="author-content-area">
        <div class="left-part">
          @include('template.menu')
        </div>
        <div class="middle-part full-width ">
           <h3>Incomplete Submision</h3>
           <table  class="table">
               <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Type</th>
                <th>Reviewers</th>
                <th>Action</th>
               </tr>
                    @php $count=0;@endphp
               @foreach($papers as $paper)
                    @php $count++;@endphp
               <tr>
                    <td>{{$count}}</td>
                    <td>{{$paper->title}}</td>
                    <td>{{$paper->abstract}}</td>
                    <td>{{$paper->article_type}}</td>
                  
                    <td>{{$paper->name}}</td>
                    <td>
                        <a href="{{url('/incomplete-paper-view/'.$paper->id)}}" class="btn btn-primary" title="View"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" data-id="{{$paper->id}}" class="btn btn-danger dlt-btn" title="Delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    
               </tr>
               @endforeach
           </table>

        </div>

    </div>

</div>
<!-- ================================================== -->
<form action="/dlt-inc" id="dltForm" method="post">
    @csrf
    <input type="hidden" id="setId" name="get_id">

  </form>
 
<!-- ================================================== -->
@include('template.footer')

@endsection()
