<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\User;
use App\Models\Reviewer;
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
        $author = $request->has('author') ? $request->get('author'):'';;
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

    public function paperView($id){
        $paper = Paper::select('*')->where('id','=',$id)->first();
        return view('paper-view',compact('paper'));
    }

    public function authorRegisterPage(){
        return view('author-register');
    }

    public function addAuthor(Request $request){
        $name = $request->has('name') ? $request->get('name'):'';
        $email = $request->has('email') ? $request->get('email'):'';
        $pass = $request->has('password') ? $request->get('password'):'';
        $type ='author';
        User::insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$pass,
            'type'=>$type,
        ]);

        return redirect('/')->with('msg','Account created, please login');
    }

    public function editorDashboard(){
        return view('editor-dashboard');
    }

    public function loginAuth(Request $request){
        $name = $request->has('name') ? $request->get('name'):'';
        $pass = $request->has('password') ? $request->get('password'):'';
        $type = $request->has('type') ? $request->get('type'):'';

        $user = User::select('*')->where('name','=',$name)
        ->where('type','=',$type)->first();
        //$userCount = $user->count();

        if($user){
            $dbuser = $user->name;
            $dbpass = $user->password;
            $dbtype = $user->type;
            session(['user' => $dbuser,'type'=>$dbtype]);
            if($name==$dbuser && $pass==$dbpass){
                if($type==$dbtype && $type=='author'){
                    return redirect('/author-dashboard');
                }else if($type =='editor' && $type=$dbtype){
                    return redirect('/editor-dashboard');
                }
            }else{
                return back()->with('msg','Incorrect Login Details');
            }
        }else{
            return back()->with('msg','No Data Found,You need to Register First');
        }
        
       
    }

    public function logout(){
        session_unset();
        return redirect('/');
    }

    public function editorPendingPaper(){
        $papers = Paper::select('*')->where('status','=',0)->get();
        return view('editor-pending',compact('papers'));
    }

    public function editorComment(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        $comment = $request->has('comment') ? $request->get('comment'):'';

        Paper::where('id','=',$id)->update([
            'editor_comment'=>$comment,
        ]);
        return back()->with('msg','Comment Added');
    }

    public function editortoRevision(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        Paper::where('id','=',$id)->update([
            'status'=>1,
        ]);
        return back()->with('msg','Send For Revision');
    }

    public function incompleteSubmission(){
        $papers = Paper::select('*')->where('status','=',1)->get();
        return view('editor-pending',compact('papers'));
    }

    public function reviewers(){
        $reviewers = Reviewer::select('*')->get();
        return view('reviewers',compact('reviewers'));
    }

    public function addReviewer(Request $request){
        $name = $request->has('name') ? $request->get('name'):'';
        $email = $request->has('email') ? $request->get('email'):'';
        $pass = $request->has('password') ? $request->get('password'):'';
        Reviewer::insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$pass,
        ]);

        return back()->with('msg','Account created, please login');
    }
}
