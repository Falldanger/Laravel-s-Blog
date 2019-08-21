<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class PaginationController extends Controller
{
   public function index(){
   	$data=DB::table('articles')->orderBy('id','asc')->paginate(6);
   	return view('pagination',compact('data'));
   }
}
?>