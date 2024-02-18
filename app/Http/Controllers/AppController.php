<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\User;
use App\Models\Incomplete;
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
        $classf[] = $request->has('classification') ? $request->get('classification'):'';
        $class ='';
        foreach($classf as $clas){
            $class = implode(',',$clas);
        }

        $reviewers = $request->has('reviewers') ? $request->get('reviewers'):'';
        $language = $request->has('language') ? $request->get('language'):'';
        $comments = $request->has('comments') ? $request->get('comments'):'';
        $title = $request->has('title') ? $request->get('title'):'';
        $abstract = $request->has('abstract') ? $request->get('abstract'):'';
        $keyword = $request->has('keyword') ? $request->get('keyword'):'';
        $author = $request->has('author') ? $request->get('author'):'';

        $s_id = $request->has('sid') ? $request->get('sid'):'';

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
        Incomplete::where('id','=',$s_id)->Delete();

        return view('author-dashboard')->with('msg','Paper Submited, Please wait for the review.Thanks!');

    }

    public function authorPending(){
        $author = session('id');
        $papers = Paper::select('*')->where('status','=',0)->
        where('author','=',$author)->get();
        return view('author-pending',compact('papers'));
    }

    public function paperView($id){
        $paper = Paper::select('*')->where('id','=',$id)->first();
        $author = User::select('*')->where('id','=',$paper->author)->first();
        $reviewers = User::select('*')->where('type','=','reviewer')->get();
        return view('paper-view',compact('paper','author','reviewers'));
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

    public function reviewerDashboard(){
        return view('reviewer-dashboard');
    }

    public function loginAuth(Request $request){
        $name = $request->has('name') ? $request->get('name'):'';
        $pass = $request->has('password') ? $request->get('password'):'';
        $type = $request->has('type') ? $request->get('type'):'';

        $user = User::select('*')->where('name','=',$name)
        ->where('type','=',$type)->first();
        

        if($user){
            $user_id = $user->id;
            $dbuser = $user->name;
            $dbpass = $user->password;
            $dbtype = $user->type;

            session(['user' => $dbuser,'type'=>$dbtype,'id'=>$user_id]);

            if($name==$dbuser && $pass==$dbpass){
                if($type==$dbtype && $type=='author'){
                    return redirect('/author-dashboard');
                }else if($type =='editor' && $type=$dbtype){
                    return redirect('/editor-dashboard');
                }else if($type =='reviewer' && $type=$dbtype){
                    return redirect('/reviewer-dashboard');
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
        $title = "Paper's need approval";
        return view('processed-paper',compact('papers','title'));
    }

    public function submissionAfterReview($reviewer){
        $type = session('type');
        if($type == 'reviewer'){
            $papers = Paper::select('*')->where('selected_reviewer','=',$reviewer)
            ->where('status','=',3)->get();
        }
        else{
           
            $papers =
            DB::table('papers')->select('papers.*','users.name')->join('users','users.id','=','papers.selected_reviewer')
            ->where('status','=',3)->get();
        }
        $title = "Paper's need approval";
        return view('editor-pending',compact('papers','title'));
    }

    public function submissionApproval(){

        $papers =
            DB::table('papers')->select('papers.*','users.name')
            ->join('users','users.id','=','papers.selected_reviewer')
            ->where('status','=',4)->get();

        $title = "Paper's are ready for approval";
        return view('editor-pending',compact('papers','title'));
    }

    public function editorComment(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        $comment = $request->has('comment') ? $request->get('comment'):'';
        $file = $_FILES['editorFile']['name'];
        $fileStore = 'upload/'.$file;
      
        move_uploaded_file($_FILES['editorFile']['tmp_name'],$fileStore);

        Paper::where('id','=',$id)->update([
            'editor_comment'=>$comment,
            'editor_file'=>$fileStore,
        ]);
        return back()->with('msg','Comment Added');
    }

    public function makeDeclined(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        Paper::where('id','=',$id)->update([
            'status'=>5,
        ]);
        return back()->with('msg','Paper Declined');
    }

    public function reviewerComment(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        $comment = $request->has('comment') ? $request->get('comment'):'';
        $file = $_FILES['editorFile']['name'];
        $fileStore = 'upload/'.$file;
      
        move_uploaded_file($_FILES['editorFile']['tmp_name'],$fileStore);

        Paper::where('id','=',$id)->update([
            'reviewer_comment'=>$comment,
            'reviewer_file'=>$fileStore,
            'status'=>3,
        ]);
        return back()->with('msg','Comment Added');
    }
    
    public function editorApprove(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        Paper::where('id','=',$id)->update([
            'status'=>4,
        ]);
        return back()->with('msg','Paper sent for Final Approval');
    }

    public function editortoRevision(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        Paper::where('id','=',$id)->update([
            'status'=>1,
        ]);
        return back()->with('msg','Send For Revision');
    }
    

    public function editortoReviewer(Request $request){
        $id = $request->has('pid') ? $request->get('pid'):'';
        $reviewer = $request->has('reviewer') ? $request->get('reviewer'):'';
       
        Paper::where('id','=',$id)->update([
            'status'=>2,
            'selected_reviewer'=>$reviewer,
        ]);
        return back()->with('msg','Send For Review');
    }

    public function revissionSubmission($user){
        $type = User::select('type')->where('id','=',$user)->first();
        $papers ='';
        if($type->type == 'author'){
            $papers = Paper::select('*')->where('author','=',$user)
            ->where('status','=',1)->get();
        }else{
            $papers = Paper::select('*')->where('status','=',1)->get();
        }
        $title = "Paper's need some revission";
        return view('editor-pending',compact('papers','title'));
    }

    public function declinedPaper($user){
        $type = User::select('type')->where('id','=',$user)->first();
        $papers ='';
        if($type->type == 'author'){
            $papers = Paper::select('*')->where('author','=',$user)
            ->where('status','=',5)->get();
        }else{
            $papers = Paper::select('*')->where('status','=',5)->get();
        }
        $title = "Declined Paper's ";
        return view('editor-pending',compact('papers','title'));
    }


    public function incompleteSubmission($user){
        $type = User::select('type')->where('id','=',$user)->first();
        $papers ='';
        if($type->type == 'author'){
            $papers = Incomplete::select('*')->where('author','=',$user)->orderBy('id','DESC')->get();
        }else{
            $papers = Incomplete::select('*')->get();
        }
        
        return view('incomplete-submission',compact('papers'));
    }

    public function incompletePaperView($id){
        $paper = Incomplete::select('*')->where('id','=',$id)->first();
        return view('incomplete-paper-view',compact('paper'));
    }
    public function processedPaper($user){
        $type = User::select('type')->where('id','=',$user)->first();
        $papers ='';
        if($type->type == 'author'){
            $papers = Paper::select('*')->where('author','=',$user)
            ->where('status','=',2)->get();
        }else{
            $papers =
            DB::table('papers')->select('papers.*','users.name')->join('users','users.id','=','papers.selected_reviewer')
            ->where('status','=',2)->get();
        }
        $title = "Paper's are being  processed";
        return view('editor-pending',compact('papers','title'));
    }

    public function authorRevision(){
        $author = session('id');
        $papers = Paper::select('*')->where('status','=',1)->
        where('author','=',$author)->get();
        $title = "Paper's need some revission";
        return view('editor-pending',compact('papers','title'));
    }
    
    public function reviewers(){
        $reviewers = User::select('*')->where('type','=','reviewer')->get();
        return view('reviewers',compact('reviewers'));
    }

    public function addReviewer(Request $request){
        $name = $request->has('name') ? $request->get('name'):'';
        $email = $request->has('email') ? $request->get('email'):'';
        $pass = $request->has('password') ? $request->get('password'):'';
        $type = 'reviewer';
        User::insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$pass,
            'type'=>$type,
        ]);

        return back()->with('msg','Account created');
    }

    public function dltReviewer(Request $request){
        $id = $request->has('get_id') ? $request->get('get_id'):'';
        User::where('id','=',$id)->delete();

        return back()->with('msg','Deleted!');
    }

    public function dltPaper(Request $request){
        $id = $request->has('get_id') ? $request->get('get_id'):'';
        Paper::where('id','=',$id)->delete();

        return back()->with('msg','Deleted!');
    }

    public function dltInc(Request $request){
        $id = $request->has('get_id') ? $request->get('get_id'):'';
        Incomplete::where('id','=',$id)->delete();

        return back()->with('msg','Deleted!');
    }

    public function inc1(Request $request){
        $type = $request->get('type');
        $author = $request->get('author');
        

        Incomplete::insert([
            'author'=>$author,
            'type'=>$type,
        ]);
        $max = Incomplete::max('id');
        return $max;

    }
    public function inc2(Request $request){
        $cdata = $request->get('cdata');
        $sid = $request->get('sid');

        Incomplete::where('id','=',$sid)->update([
            'classification'=>$cdata,
        ]);
    
        return $sid .$cdata;

    }
    public function inc3(Request $request){
        $cdata = $request->get('cdata');
        $sid = $request->get('sid');

        Incomplete::where('id','=',$sid)->update([
            'reviewers'=>$cdata,
        ]);
    
        return $sid. ' '.$cdata;

        
    }
    public function inc4(Request $request){
        $cdata = $request->get('cdata');
        $sid = $request->get('sid');

        Incomplete::where('id','=',$sid)->update([
            'language'=>$cdata,
        ]);
    
        return $sid;

    }
    public function inc5(Request $request){
        $cdata = $request->get('cdata');
        $sid = $request->get('sid');

        Incomplete::where('id','=',$sid)->update([
            'author_comment'=>$cdata,
        ]);
    
        return $sid;

    }
    public function inc6(Request $request){
        $title = $request->get('title');
        $abstract = $request->get('abstract');
        $keyword = $request->get('keyword');
        $sid = $request->get('sid');

        Incomplete::where('id','=',$sid)->update([
            'title'=>$title,
            'abstract'=>$abstract,
            'keyword'=>$keyword,
        ]);
    
        return $sid;

    }
  
}
