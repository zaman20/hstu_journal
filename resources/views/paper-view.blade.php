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

           <h3>Title:{{$paper->title}}</h3>
           <table class="table table-bordered">
                <tr>
                    <td>Article Type</td>
                    <td>{{$paper->article_type}}</td>
                </tr>
                <tr>
                    <td>Abstract</td>
                    <td>{{$paper->abstract}}</td>
                </tr>
                <tr>
                    <td>Keyword</td>
                    <td>{{$paper->keyword}}</td>
                </tr>
                <tr>
                    <td>Classification</td>
                    <td>{{$paper->classification}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if($paper->status == 0)
                        <span class="bg-info">Pending For Editor Approval</span>
                        @elseif($paper->status == 1)
                        <span class="bg-danger">In Revision</span>
                        @endif
                    </td>
                    
                </tr>
                <tr>
                    <td>Suggested Reviewers</td>
                    <td>{{$paper->reviewers}}</td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>{{$paper->author}}</td>
                </tr>
                <tr>
                    <td>Author Comments</td>
                    <td>{{$paper->author_comment}}</td>
                </tr>
                <tr>
                    <td>File</td>
                    <td>
                        <a href="/{{$paper->files}}" download class="btn btn-success">Download File <i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                </tr>
           </table>

           @if(session('type')=='editor')
           <form action="/editor-comment" method="post" enctype="multipart/filedata">
                @csrf
                <input type="hidden" name="pid" value="{{$paper->id}}">
                <label for="">Add Comments</label><br>
                <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
                <input type="file" class="form-control my-2">
                <input type="submit" value="Add Comment" class="btn btn-primary my-2">
           </form>

           <form action="/editor-to-revision" method="post" >
                @csrf
                <input type="hidden" name="pid" value="{{$paper->id}}">
                <input type="submit" value="Send For Revision" class="btn btn-danger my-2">
                <a href="#" class="btn btn-info my-2">Select Reveiwer</a>
           </form>

           @endif
        </div>

    </div>

</div>

@include('template.header')

@endsection()
