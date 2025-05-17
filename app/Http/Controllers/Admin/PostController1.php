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
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::latest()->paginate(12);
        $actives = Blog::latest()->whereStatus('active')->paginate(12);
        $drafts = Blog::latest()->whereStatus('draft')->paginate(12);
        $inactives = Blog::latest()->whereStatus('inactive')->paginate(12);
        return view('admin.post.index',[
            'posts' => $posts,
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
        return view('admin.post.create');
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'img' => 'required',
            'author_id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],422);
        }

        if ($request->hasFile('img')) {
            $original = $request->file('img');
            $filename = time() . '.' . $original->getClientOriginalExtension();
            $original->move(public_path('../../public_html/assetss/post/'), $filename);
        }
        Blog::create([
            'title' =>  $request->title,
            'slug' =>  $request->slug,
            'body' =>  $request->body,
            'img' => $filename,
            'author_id' =>  $request->author_id,
            'status' =>  $request->status,
        ]);

        return redirect('/admin/posts')->with(['message' => 'با موفقیت ثبت شد'],200);
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
    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        return view('admin.post.edit',[
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
          'title' => 'required',
          'slug' => 'required',
          'body' => 'required',
          'author_id' => 'required',
          'status' => 'required',
      ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],422);
        }

        $data = $request->all();

        $post = Blog::findOrFail($id);
        if ($request->hasFile('img')) {
            $original = $request->file('img');
            $filename = time() . '.' . $original->getClientOriginalExtension();
            $original->move(public_path('../../public_html/assetss/post/'), $filename);
        }

		DB::table('blogs')->where('id', $id)->update([
          'title' =>$request->title,
          'slug' =>$request->slug,
          'body' =>$request->body,
          'img' =>$filename,
          'author_id' =>$request->author_id,
          'status' =>$request->status,
        ]);

        return redirect('/admin/posts')->with(['message' => 'با موفقیت ویرایش شد!'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Blog::find($id)->delete($id);
        return 'ok';
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Blog::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => "صفحات با موفقیت حذف گردیدند"]);
    }
}
