@extends('template.body')
@section('content')
<div class="main-container">
    @include('template.header')
    <div class="author-content-area">
        <div class="left-part">
          @include('template.author-menu')
        </div>
        <div class="middle-part full-width ">
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
                    @if($paper->status == 0)
                    <td><span class="bg-info">Pending For Editor Approval</span></td>
                    @endif
                </tr>
                <tr>
                    <td>Reviewers</td>
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
                    <td>{{$paper->files}}</td>
                </tr>
           </table>

        </div>

    </div>

</div>

@include('template.header')

@endsection()
