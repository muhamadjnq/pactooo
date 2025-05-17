<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(12);
        $actives = Blog::latest()->whereStatus('active')->paginate(12);
        $drafts = Blog::latest()->whereStatus('draft')->paginate(12);
        $inactives = Blog::latest()->whereStatus('inactive')->paginate(12);
        return view('admin.blogs.index',[
            'blogs' => $blogs,
            'actives' => $actives,
            'drafts' => $drafts,
            'inactives' => $inactives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    public function check_slug(Request $request)
    {
        //to generate unique slugs
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->en_title);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'title' => 'required|unique:blogs|max:255',
          'body' => 'required',
          'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $data = $request->only('title', 'body', 'status');
      $data['author_id'] = auth()->id();
      $data['slug'] = Str::slug($request->title);

      if ($request->hasFile('img')) {
          $data['img'] = $request->file('img')->store('blogs', 'public');
      }

      Blog::create($data);
      return redirect()->route('admin.blogs.index')->with('success', 'وبلاگ با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function edit(Blog $blog)
     {
         return view('admin.blogs.edit', compact('blog'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:255|unique:blogs,title,' . $blog->id,
            'body' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('title', 'body', 'status');
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('blogs', 'public');
        }

        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'وبلاگ با موفقیت به‌روزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Blog $blog)
     {
         if ($blog->img) {
             \Storage::delete('public/' . $blog->img);
         }

         $blog->delete();
         return redirect()->route('admin.blogs.index')->with('success', 'وبلاگ با موفقیت حذف شد.');
     }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Blog::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => "صفحات با موفقیت حذف گردیدند"]);
    }
}
