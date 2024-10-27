<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use Illuminate\Support\Facades\DB;
use App\Models\logis;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = branch::orderBy('id', 'desc')->paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.branch.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = DB::table('users')->select(
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
            ->get();
//dd($user);
            $data['user'] = $user;

            $logis = logis::all();
            $data['logis'] = $logis;

            $data['method'] = "post";
            $data['url'] = url('admin/branch');
            return view('admin.branch.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'user_id' => 'required',
            'name_branch' => 'required',
            'address_branch' => 'required',
            'code_branch' => 'required',
            'phone' => 'required',
            'admin_branch' => 'required',
            'province' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
           ]);


           $objs = new branch();
           $objs->user_id = $request['user_id'];
           $objs->name_branch = $request['name_branch'];
           $objs->address_branch = $request['address_branch'];
           $objs->code_branch = $request['code_branch'];
           $objs->province = $request['province'];
           $objs->phone = $request['phone'];
           $objs->admin_branch = $request['admin_branch'];
           $objs->time = $request['time'];
           $objs->email = $request['email'];
           $objs->latitude = $request['latitude'];
           $objs->longitude = $request['longitude'];
           $objs->save();

           return redirect(url('admin/branch'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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

        $user = DB::table('users')->select(
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
            ->get();
//dd($user);
            $data['user'] = $user;

            $logis = logis::all();
            $data['logis'] = $logis;

        $objs = branch::find($id);
        $data['url'] = url('admin/branch/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.branch.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'user_id' => 'required',
            'name_branch' => 'required',
            'address_branch' => 'required',
            'code_branch' => 'required',
            'phone' => 'required',
            'admin_branch' => 'required',
            'province' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
           ]);


           $objs = branch::find($id);
           $objs->user_id = $request['user_id'];
           $objs->name_branch = $request['name_branch'];
           $objs->address_branch = $request['address_branch'];
           $objs->code_branch = $request['code_branch'];
           $objs->phone = $request['phone'];
           $objs->admin_branch = $request['admin_branch'];
           $objs->time = $request['time'];
           $objs->email = $request['email'];
           $objs->province = $request['province'];
           $objs->latitude = $request['latitude'];
           $objs->longitude = $request['longitude'];
           $objs->save();

           return redirect(url('admin/branch/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
