<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class IndexController extends Controller
{
	protected $message;
	protected $header;
	public function __construct(){
		$this->header = 'Hello, World!';
    	$this->message='This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';

	}

    public function index(){

    	$articles=Article::select(['id','title','desc'])->get();

    	//dump($articles);

    	return view('page')->with(['message'=>$this->message,'header'=>$this->header,'articles'=>$articles]);
    }

    public function show($id){
    	//$article=Article::find($id);
    	$article=Article::select(['id','title','text'])->where('id',$id)->first();
    	//dump($article);
    	return view('article-content')->with(['message'=>$this->message,'header'=>$this->header,'article'=>$article]);
    }

    public function add(){
    	return view('add-content')->with(['message'=>$this->message,'header'=>$this->header]);
    }

    public function store(Request $request){
    	$this->validate($request,['title'=>'required|max:255','alias'=>'required|unique:articles','text'=>'required']);
    	$data=$request->all();
    	$article = new Article;
    	$article->fill($data);
    	$article->save();
    	return redirect('/');
    	
    }

}
