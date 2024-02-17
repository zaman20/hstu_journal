@extends('template.body')
@section('content')
<div class="main-container">
    @include('template.header')
    <div class="author-content-area">
        <div class="left-part">
          @include('template.menu')
        </div>
        <div class="middle-part full-width ">
           <h3>{{$title}}</h3>
           <table  class="table">
               <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Type</th>
                <th>Status</th>
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
                    <td>
                        @if($paper->status == 0)
                        <span class="bg-info">Pending For Editor Approval</span>
                        @elseif($paper->status == 1)
                            <span class="bg-danger">In Revision</span>
                        @elseif($paper->status == 2)
                            <span class="bg-warning">In Review</span>
                        @endif
                    </td>
                    <td>{{$paper->name}}</td>
                    <td>
                        <a href="{{url('/paper-view/'.$paper->id)}}" class="btn btn-primary" title="View"><i class="fa-solid fa-eye"></i></a>
                        @if(session('type')=='editor' || session('type')== 'author')
                        <a href="#" data-id="{{$paper->id}}" class="btn btn-danger dlt-btn" title="Delete"><i class="fa-solid fa-trash"></i></a>
                        @endif
                    </td>
                    
               </tr>
               @endforeach
           </table>

        </div>

    </div>

</div>
<!-- ================================================== -->
<form action="/dlt-paper" id="dltForm" method="post">
    @csrf
    <input type="hidden" id="setId" name="get_id">

  </form>
<!-- ================================================== -->
@include('template.footer')

@endsection()
