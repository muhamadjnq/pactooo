<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       //fetch 5 Blogs from database which are active and latest
       $blogs = Blog::where('status','active')->orderBy('created_at','desc')->paginate(12);
       $posts = Blog::where('status','active')->orderBy('created_at', 'desc')->take(4)->get();
       //page heading
       $title = 'Latest Blogs';
       //return home.blade.php template from resources/views folder
       return view('blog.index',[
         'blogs'=>$blogs,
         'posts' => $posts,
         ]);
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($slug)
     {
       $latests = Blog::latest()->get();
       $blogs = Blog::where('slug',$slug)->first();
       $comments = $blogs->comments;
       return view('blog.show',[
         'blogs'=>$blogs,
         'comments' => $comments,
         'latests' => $latests,
         ]);
     }
}
