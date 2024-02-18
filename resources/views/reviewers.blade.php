@extends('template.body')
@section('content')
<div class="main-container">
    @include('template.header')
    <div class="author-content-area">
        <div class="left-part">
          @include('template.menu')
        </div>
        <div class="middle-part full-width ">
            @include('template.alert')
            <h3>Reviewer's are Here</h3>
            <button type="button" class="btn btn-dark my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Add Reviewers
            </button>

<!-- =============================== -->
<!-- Modal for reviewer create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Reviewer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="/add-reviewer" method="post">
                @csrf
                <label for="">Username:</label> <br>
                <input type="text" name="name" class="form-control my-1"> <br>
                <label for="">Password: </label> <br>
                <input type="password" name="password" class="form-control my-1"> <br>
                <label for="">Email: </label> <br>
                <input type="email" name="email" class="form-control my-1"> <br>
                <input type="submit" value="Add Reviewer" class="form-control my-1 btn btn-dark" >
            </form>
      </div>
     
    </div>
  </div>
</div>
<!-- =============================== -->

           <table  class="table">
               <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
               </tr>
                    @php $count=0;@endphp
               @foreach($reviewers as $paper)
                    @php $count++;@endphp
               <tr>
                    <td>{{$count}}</td>
                    <td>
                      <a href="{{url('/processed-paper/user='.$paper->id)}}">
                        {{$paper->name}}
                      </a>
                    </td>
                    <td>{{$paper->email}}</td>
                    <td>
                        <a href="#" data-id="{{$paper->id}}" class="btn btn-danger dlt-btn" title="Delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    
               </tr>
               @endforeach
           </table>
        </div>
    </div>
</div>

<!-- ================================================== -->
  <form action="/dlt-reviewer" id="dltForm" method="post">
    @csrf
    <input type="hidden" id="setId" name="get_id">

  </form>
<!-- ================================================== -->

@include('template.footer')

@endsection()
