<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
    	 $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'description' => 'required',
        'tag' => 'required',
        'author' => 'required|min:4|max:50',
        ]);

        $post= new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->save();
        if ($post->save()) {
        	$notification=array(
        		'messege'=>'Post Added Successfully!!','alert-type'=>'success'
        		);
        	return Redirect()->back()->with($notification);
        	
        }
        else {
        return Redirect()->back();
        }
    
    }

    public function AllPost() {
    	$post=Post::all();
    	return view('all-post')->with('post',$post);
    }

    public function DeletePost($id) {
       
       $post= Post::find($id);
       $delete=$post->delete();

        if ($delete) {
        	$notification=array(
        		'messege'=>'Post Deleted Successfully!!','alert-type'=>'success'
        		);
        	return Redirect()->back()->with($notification);
        	
        }
        else {
        return Redirect()->back();
        }


    }

    public function EditPost($id) {
    	$post=Post::findorfail($id);
    	return view('edit-post', compact('post'));
    }

    public function UpdatePost(Request $request, $id) {
    	 $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'tag' => 'required',
        'author' => 'required|min:4|max:50',
        ]);

    	$post= Post::findorfail($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->save();
        if ($post->save()) {
        	$notification=array(
        		'messege'=>'Post Updated Successfully!!','alert-type'=>'success'
        		);
        	return Redirect()->route('home')->with($notification);
        	
        }
        else {
        return Redirect()->back();
        }

    }

    public function News() {
        return view('news-add');
    }

    public function InsertNews(Request $request) {

        $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'details' => 'required',
        'image' => 'required',
        'author' => 'required|min:4|max:50',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['author']=$request->author;
        $data['details']=$request->details;
        $image=$request->image;

        if($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/post/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            if ($success) {
                $data['image']=$image_url;

            $news=DB::table('newses')->insert($data);

            if ($news) {
              $notification=array(
                'messege'=>'News Added Successfully!!','alert-type'=>'success'
                );
            return Redirect()->route('news.add')->with($notification);
            }else {
                return Redirect()->back();
            }
            }

        }else {
            return Redirect()->back();
        }

    }

    public function AllNews() {
        $news=DB::table('newses')->get();
        return view('all-news',compact('news'));
    }

    public function DeleteNews($id)
    {
        $img=DB::table('newses')->where('id',$id)->first();
        $image_path=$img->image;
        $done=unlink($image_path);

        $delete=DB::table('newses')->where('id',$id)->delete();
        if ($delete) {
              $notification=array(
                'messege'=>'News Deleted Successfully!!','alert-type'=>'success'
                );
            return Redirect()->route('all.news')->with($notification);
            }else {
                return Redirect()->back();
            }
    }

}
