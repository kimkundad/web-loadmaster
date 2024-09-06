<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Response;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
        $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'role_user.*',
            'roles.*',
            'roles.name as name1',
            )
            ->leftjoin('role_user', 'role_user.user_id',  'users.id')
            ->leftjoin('roles', 'roles.id',  'role_user.role_id')
            ->where('role_user.role_id', 4)
            ->orderby('role_user.id', 'asc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.driver.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/driver');
        return view('admin.driver.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'avatar' => 'required',
            'type_car' => 'required',
            'no_car' => 'required',
            'phone' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required'
        ]);

        $email = rand(1000000,9999999)."@gmail.com";


        $image = $request->file('avatar');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());

          $img->resize(400, 400, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('loadmaster/driver/'.$image->hashName(), $img, 'public');

        $user = User::create([
            'name' => $request['name'],
            'email' => $email,
            'phone' => $request['phone'],
            'code_user' => $request['code_user'],
            'type_car' => $request['type_car'],
            'no_car' => $request['no_car'],
            'avatar' => $image->hashName(),
            'provider' => 'email',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'is_admin' => 0,
            'password' => Hash::make($request['password']),
        ]);

        $objs = Role::where('id', $request['role'])->first();

        $user
        ->roles()
        ->attach(Role::where('name', $objs->name)->first());

        return redirect(url('admin/driver'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $objs = User::find($id);
        $data['url'] = url('admin/driver/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.driver.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $this->validate($request, [
            'type_car' => 'required',
            'no_car' => 'required',
            'phone' => 'required',
            'name' => ['required', 'string', 'max:255']
        ]);

        if($request['password'] == null){

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->type_car = $request['type_car'];
                $objs->phone = $request['phone'];
                $objs->no_car = $request['no_car'];
                $objs->code_user = $request['code_user'];
                $objs->save();

        }else{

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->no_car = $request['no_car'];
                $objs->phone = $request['phone'];
                $objs->type_car = $request['type_car'];
                $objs->code_user = $request['code_user'];
                $objs->password = Hash::make($request['password']);
                $objs->save();

        }


        return redirect(url('admin/driver/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
