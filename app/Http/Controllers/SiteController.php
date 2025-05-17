<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Blog;

class SiteController extends Controller
{
    public function test(): View
    {
        $posts = Blog::where('status','active')->orderBy('created_at', 'desc')->take(3)->get();
        return view('test',['posts' => $posts,]);
    }
    public function index(): View
    {
        $posts = Blog::where('status','active')->orderBy('created_at', 'desc')->take(3)->get();
        return view('site.index',['posts' => $posts,]);
    }
    public function services(): View
    {
        return view('site.services');
    }
    public function social(): View
    {
        return view('site.social');
    }
    public function seo(): View
    {
        return view('site.seo');
    }
    public function email(): View
    {
        return view('site.email');
    }
    public function site(): View
    {
        return view('site.site');
    }

    public function video(): View
    {
        return view('site.video');
    }
    public function projects(): View
    {
        return view('site.projects');
    }
    public function sudio(): View
    {
        return view('site.sudio');
    }
    public function about(): View
    {
        return view('site.about');
    }
    public function contact(): View
    {
        return view('site.contact');
    }
    public function project(): View
    {
        return view('site.project');
    }

}
