<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    public function ViewPost($id)
    {
    	$post=DB::table('newses')->where('id',$id)->first();
    	return view('singlenews')->with('singlepost',$post);
    }
}
