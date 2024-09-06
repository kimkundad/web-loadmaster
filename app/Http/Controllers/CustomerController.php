<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
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
            ->where('role_user.role_id', 3)
            ->orderby('role_user.id', 'asc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.customer.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $get_role = DB::table('role_user')->where('user_id',$id)->first();

        $data['get_role'] = $get_role;
        $objs = User::find($id);
        $data['url'] = url('admin/customer/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $Role = Role::all();
        $data['Role'] = $Role;
        return view('admin.customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if($request['password'] == null){

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);

            $objs = User::find($id);
            $objs->name = $request['name'];
            $objs->email = $request['email'];
            $objs->phone = $request['phone'];
            $objs->save();

        }else{

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            $objs = User::find($id);
            $objs->name = $request['name'];
            $objs->email = $request['email'];
            $objs->phone = $request['phone'];
            $objs->password = Hash::make($request['password']);
            $objs->save();

        }

        return redirect(url('admin/customer/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
