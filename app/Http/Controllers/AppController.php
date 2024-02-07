<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function authorDashboard(){
        return view('author-dashboard');
    }

    public function authorSubmit(){
        return view('author-submit');
    }

    public function paperSubmit(Request $request){
        $type = $request->has('type') ? $request->get('type'):'';
        //$file = $request->hasFile('authorfile') ? $request->get('authorfile'):'';
        $class = $request->has('classification') ? $request->get('classification'):'';
        $reviewers = $request->has('reviewers') ? $request->get('reviewers'):'';
        $language = $request->has('language') ? $request->get('language'):'';
        $comments = $request->has('comments') ? $request->get('comments'):'';
        $title = $request->has('title') ? $request->get('title'):'';
        $abstract = $request->has('abstract') ? $request->get('abstract'):'';
        $keyword = $request->has('keyword') ? $request->get('keyword'):'';
        $author = 'zaman';
        $file = $_FILES['authorfile']['name'];
        $fileStore = 'upload/'.$file;
      
        move_uploaded_file($_FILES['authorfile']['tmp_name'],$fileStore);

        Paper::insert([
            'author'=>$author,
            'article_type'=>$type,
            'files'=>$fileStore,
            'classification'=>$class,
            'reviewers'=>$reviewers,
            'language'=>$language,
            'author_comment'=>$comments,
            'title'=>$title,
            'abstract'=>$abstract,
            'keyword'=>$keyword,
        ]);
        return view('author-dashboard')->with('msg','Paper Submited, Please wait for the review.Thanks!');

    }

    public function authorPending(){
        $papers = Paper::select('*')->where('status','=',0)->get();
        return view('author-pending',compact('papers'));
    }

    public function authorPaperView($id){
        $paper = Paper::select('*')->where('id','=',$id)->first();
        return view('author-paper-view',compact('paper'));
    }
}
