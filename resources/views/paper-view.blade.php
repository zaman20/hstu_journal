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
                        @elseif($paper->status == 2)
                            <span class="bg-warning">In Review</span>
                        @endif
                    </td>
                    
                </tr>
                <tr>
                    <td>Suggested Reviewers</td>
                    <td>{{$paper->reviewer}}</td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>{{$author->name}}</td>
                </tr>
                <tr>
                    <td>Author Comments</td>
                    <td>{{$paper->author_comment}}</td>
                </tr>
                <tr>
                    <td>File</td>
                    <td>
                        <a href="/{{$paper->files}}" download class="btn btn-success">Download File <i class="fa-solid fa-cloud-arrow-down"></i></a>
                    </td>
                </tr>
           </table>

           @if($paper->status != 0)
            <h3>Editor Suggestion</h3>
            <table class="table table-info">
                    <tr>
                        <td>Editor Comments:</td>
                        <td> File:</td>
                    </tr>
                    <tr>
                        <td>{{$paper->editor_comment}}</td>
                        <td>
                        <a href="/{{$paper->editor_file}}" download class="btn btn-danger">Download File <i class="fa-solid fa-cloud-arrow-down"></i></a>
                        </td>
                    </tr>
            </table>
            @endif

           @if(session('type')=='editor')
           <form action="/editor-comment" method="post" enctype="multipart/filedata">
                @csrf
                <input type="hidden" name="pid" value="{{$paper->id}}">
                <label for="">Add Comments</label><br>
                <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
                <input type="file" name="editorFile" class="form-control my-2">
                <input type="submit" value="Add Comment" class="btn btn-primary my-2">
           </form>
           <form action="/editor-to-revision" method="post" >
                @csrf
                <input type="hidden" name="pid" value="{{$paper->id}}">
                <input type="submit" value="Send For Revision" class="btn btn-danger my-2">
                <button type="button" class="btn btn-info my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Select Reviewer
            </button>
            </form>
            <!-- ============================================ -->
           <!-- Button trigger modal -->
           
           
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Select Reviwer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/editor-to-reviewer" method="post" >
                                @csrf
                                <input type="hidden" name="pid" value="{{$paper->id}}">
                                <label for="">Paper Title: {{$paper->title}}</label><br>

                    
                                <select name="reviewer" class="form-select my-2">
                                    <option disabled selected>Select Reviewer Name </option>
                                @foreach($reviewers as $reviewer)
                                    <option value="{{$reviewer->id}}">{{$reviewer->name}}</option>
                                @endforeach
                                </select>
                                <input type="submit" class="btn btn-dark my-2 form-control"  value="Nominate">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
           <!-- ============================================ -->
           @endif
        </div>

    </div>

</div>

@include('template.header')

@endsection()
