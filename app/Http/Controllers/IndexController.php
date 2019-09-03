<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Exception;
use DB;

class IndexController extends Controller
{
	protected $message;
	protected $header;
	public $error;
	public function __construct(){
		$this->header = 'Сollection of the most amazing places';
    	$this->message='This page presents a list of fascinating places';

	}

	//Index page
    public function index(){
    	$articles= new Article;
    	$queries=[];
    	$columns=['id','views','filter'];
    	
    	foreach ($columns as $column) {
    		if(request()->has($column)){
    			if(request('filter')){
			        $articles=$articles->where(request('filter'), '>=',0);
    				$queries[$column]=request($column);
    			}	
    		}
    	}

    	if(request()->has('sort')){
    		$articles=$articles->orderBy(request('filter'), request('sort'));
    		$queries['sort']=request('sort');
    	}
    	if(!(request()->has('sort'))||!(request()->has('filter'))){
    		$articles=$articles->orderBy('id','desc');
    	}

    	$articles=$articles->paginate(6)->appends($queries);

    	return view('page',compact('articles'))->with(['message'=>$this->message,'header'=>$this->header,'articles'=>$articles]);
    	
    }

    public function show($id){
    	
    	$article=Article::select(['id','country','place','image','desc','text','views','created_at'])->where('id',$id)->increment('views', 1);
    	
    	$article=Article::select(['id','country','place','image','desc','text','views','created_at'])->where('id',$id)->first();
    	
    	return view('article-content')->with(['message'=>$this->message,'header'=>$this->header,'article'=>$article]);
    }


    //Add
    public function add(){
    	return view('add-content')->with(['message'=>$this->message,'header'=>$this->header]);
    }


    //Edit
    public function edit($id){

    	$post=Article::find($id);
    	return view('edit-content')->withPost($post);

    }


    //Update
    public function update(Request $request,$id){

    	try{

    		if (isset($_POST)) {
  			$filename=$_FILES['image']['name'];

		    $blacklist = ['.php', '.phtml', '.php3', '.php4', '.html', '.htm','.doc','.docx','.txt'];
		    foreach ($blacklist as $item) {
		        if (preg_match("/$item$/", $_FILES['image']['name'])){throw new Exception('File extension not suitable!');
		        }
		    }
		    
		    $type = getimagesize($_FILES['image']['tmp_name']);
		    if ($type && ($type['mime'] != 'image/png' || 
		    $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
		        if ($_FILES['image']['size'] < 1024 * 10000) {
		            $upload = 'C:\OSPanel\domains\minilaravel.loc\public\img\\'.$_FILES['image']['name'];
		            $post=Article::find($id);

			    	$post->country=$request->country;
			    	$post->place=$request->place;
			    	$post->desc=$request->desc;
			    	$post->text=$request->text;
			    	$post->image=$request->image;
			    	$post->updated_at=$request->updated_at;

			    	$post->save();

		    $query=Article::select(['id','image'])->where('id',$post->id)->update(['image' => $filename]);
		            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {return redirect('/');}
		            else {throw new Exception('Error loading file');
		        }
		        }
		        else {throw new Exception('File size exceeded! (Max:  10mb)');
		    }
		    }
		    else {throw new Exception('File type not suitable');}
    		}
    	}
    	catch(Exception $e){
    		$this->error=$e->getMessage();
    		return view('edit-content')->with(['message'=>$this->message,'header'=>$this->header,'error'=>$this->error]);
    	}
    }


    //Store
    public function store(Request $request){

    	try{

    		if (isset($_POST)) {
  			$filename=$_FILES['image']['name'];

		    $blacklist = ['.php', '.phtml', '.php3', '.php4', '.html', '.htm','.doc','.docx','.txt'];
		    foreach ($blacklist as $item) {
		        if (preg_match("/$item$/", $_FILES['image']['name'])){throw new Exception('File extension not suitable!');
		        }
		    }
		    
		    $type = getimagesize($_FILES['image']['tmp_name']);
		    if ($type && ($type['mime'] != 'image/png' || 
		    $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
		        if ($_FILES['image']['size'] < 1024 * 10000) {
		            $upload = '..\public\img\\'.$_FILES['image']['name'];
		            $data=$request->all();
			        $article = new Article;
			        $article->fill($data);
			        $article->save();

		    $query=Article::select(['id','image'])->where('id',$article->id)->update(['image' => $filename]);
		            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {return redirect('/');}
		            else {throw new Exception('Error loading file');
		        }
		        }
		        else {throw new Exception('File size exceeded! (Max:  10mb)');
		    }
		    }
		    else {throw new Exception('File type not suitable');}
    		}
    	}
    	catch(Exception $e){
    		$this->error=$e->getMessage();
    		return view('add-content')->with(['message'=>$this->message,'header'=>$this->header,'error'=>$this->error]);
    	}

    }
    
}
