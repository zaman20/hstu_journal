@extends('template.body')
@section('content')
<div class="main-container">
    @include('template.header')
    <div class="author-content-area">
        <div class="left-part">
          @include('template.menu')
        </div>
        <div class="middle-part full-width">
           
            <div class="form-area border border-primary border-2">
                <form action="/paper-submit" method="post" enctype="multipart/form-data">
                @csrf
                    <h5>Article Type Selection</h5>
                    <select name="type" id="type" class="form-select">
                        <option value="{{$paper->type}}" selected>{{$paper->type}}</option>
                        <option value="Full Length Article">Full Length Article</option>
                        <option value="Manuscript">Manuscript</option>
                        <option value="Short Length">Short length</option>
                    </select>
                    <input type="hidden"  name="sid" value="{{$paper->id}}">
                <br>
                    <h5>Classification </h5>
                    <input name="classification[]" type="checkbox" class="form-check-input" value="{{$paper->classification}}" checked>{{$paper->classification}}<br>
                    <input name="classification[]" type="checkbox" class="form-check-input" value="Biomedical Statistics">Biomedical Statistics <br>
                    <input name="classification[]" type="checkbox" class="form-check-input" value="Clinical Trial">Clinical Trials <br>
                    <input name="classification[]" type="checkbox" class="form-check-input" value="Cognitive Science">Cognitive Science <br>
                    <input name="classification[]" type="checkbox" class="form-check-input" value="Computional Biology">Computional Bilogy <br>

                <br>
                    <h5>Review Preferences</h5>
                    
                    <input name="reviewers" type="text" value="{{$paper->reviewers}}" class="form-control" placeholder="Suggested Reviewers">
                    
                <br>
               
                    <label for="">If English is not your first language,has your paper been edited by a native English
                        Speaker?</label>
                <br>
              
                    <input name="language" value="{{$paper->language}}" checked type="radio" class="form-check-input">{{$paper->language}} <br>
                    <input name="language" value="Yes" type="radio" class="form-check-input">Yes <br>
                    <input name="language" value="No" type="radio" class="form-check-input">No <br>
                    <input name="language" value="Not Applicable" type="radio" class="form-check-input">Not Applicable <br>
              
                <br>
                    <h5>Comments</h5>
              
                    <label for="">Enter Comments</label>
                    <textarea name="comments" id="comment" cols="30" rows="10" class="form-control">{{$paper->comment}}</textarea>
                    
                <br>
                    <h5>Manuscript Data</h5>

                    <input value="{{$paper->title}}" name="title" type="text" class="form-control" placeholder="Title" > <br>
                    <input value="{{$paper->abstract}}" name="abstract" type="text" class="form-control" placeholder="Abstract"> <br>
                    <input value="{{$paper->keyword}}" name="keyword" type="text" class="form-control" placeholder="Keyword">
                    
                <br>
                    <h5>Attach Files </h5>
             
                        <input name="authorfile" id="file" type="file" required>
                        <input type="hidden" value="{{session('id')}}" name="author">
                    <button  class="paper-submit btn btn-secondary mt-2">Submit</button>
                </form>

            </div>
            
            

        </div>

    </div>

</div>


@include('template.footer')

@endsection()
