<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\lib\EnConverter;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all()->map(function ($user) {
          return [
              'id' => $user->id,
              'name' => $user->name,
              'email' => $user->email,
              'last_login_at' => $user->last_login_at,
              'is_online' => $user->isOnline(),
              'role' => $user->role,
              'status' => $user->status,
              'phone' => $user->phone,
          ];
      });

      return view('admin.user.index', compact('users'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.user.create');
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
            'name' => ['required', 'string'],
            'email' => ['nullable', 'email','unique:users'],
            'phone' => ['required', 'string','unique:users'],
            'password' => ['required','confirmed', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],422);
        }

        $password = EnConverter::bn2en($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($password),
        ]);

        $wallet = Wallet::create([
            'user_id' => $user->id,
            'balance' => 0,
            'valid' => 0
        ]);
        return redirect('/admin/users')->with(['message' => 'کاربر مورد نظر با موفقیت ایجاد گردید.'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $accounts = ['admin' => 'مدیر', 'user' => 'خریدار', 'seller' => 'فروشنده', 'courier' => 'پیک'];
      $user = User::findOrFail($id);
      $roles = Role::latest()->get();
      $addresses = $user->address;
      return view('admin.user.edit',[
          'user' => $user,
          'roles' => $roles,
          'accounts' => $accounts,
          'addresses' => $addresses
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
      $validation = [
        'name' => ['required', 'string'],
        'email' => ['nullable', 'email','unique:users'],
        'phone' => ['required', 'string','unique:users'],
        'password' => ['required','confirmed', 'string', 'min:6'],
      ];

      $validator = Validator::make($request->all(), $validation);

      if ($validator->fails()) {
          return response()->json(['errors' => $validator->errors()->all()],422);
      }
      $user = User::find($id);
      if($request->password != null){
          $password = EnConverter::bn2en($request->password);
          $user->password = Hash::make($password);
      }
      $user->role = $request->role;
      $user->name = $request->name;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->status = $request->status;
      $user->update();

      $wallet = Wallet::where('user_id',$id)->first();
      if(! $wallet){
          Wallet::create([
              'user_id' => $id,
              'balance' => 0,
              'valid' => 0
          ]);
          return response()->json(['message' => 'کاربر مورد نظر با موفقیت بروزرسانی گردید و کیف پولش فعال گردید.'],200);
      }
      return response()->json(['message' => 'کاربر مورد نظر با موفقیت بروزرسانی گردید.'],200);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string'],
            'name' => ['nullable', 'string', 'persian_alpha'],
            'email' => ['nullable', 'email'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()],422);
        }
        $user = User::find($request->user_id);
        if ($request->hasFile('avatar')) {

            //For delete Image in public folder
            if($user->avatar != null){
                $image_path = public_path() . '/assets/img/avatar/' . $user->avatar;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            //End delete Image

            // Save Image New
            $image = $request->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(256, 256);
            // $image_resize->insert('assets/watermark.png','bottom-left',10,10);
            $image_resize->save(public_path('assets/img/avatar/' . $filename));
            $user->avatar = $filename;
            // End save

        }
        $user->role = $request->role;
        $user->name = $request->name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();
        return response()->json(['message' => 'پروفایل بروزرسانی گردید.'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete = User::find($id)->delete($id);
      return redirect('/admin/users')->with(['message' => 'کاربر مورد نظر با موفقیت حذف گردید.'],200);
    }
    public function search(Request $request)
    {
        return view('admin.includes.modal.user');
    }
}
