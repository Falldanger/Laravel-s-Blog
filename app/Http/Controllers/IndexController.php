<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class IndexController extends Controller
{
    public function index(){

    	$header = 'Hello, World!';
    	$message='This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';

    	$articles=Article::select(['id','title','desc'])->get();

    	//dump($articles);

    	return view('page')->with(['message'=>$message,'header'=>$header,'articles'=>$articles]);
    }
}
