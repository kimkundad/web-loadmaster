<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\branch;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = order::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.orders.index', compact('objs'));
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
            ->where('role_user.role_id', 4)
            ->orderby('role_user.id', 'asc')
            ->get();
            $data['user'] = $user;

        $branch = branch::all();

        $data['branch'] = $branch;
        $data['method'] = "post";
        $data['url'] = url('admin/myorder');
        return view('admin.orders.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'branch_id' => 'required',
            'driver_id' => 'required',
            'code_order' => 'required',
            'dri_time' => 'required',
            'amount' => 'required',
            'price' => 'required'
           ]);

           $branch = branch::where('id', $request['branch_id'])->first();
           $user = User::where('id', $branch->user_id)->first();
           $dri = User::where('id', $request['driver_id'])->first();

           $objs = new order();
           $objs->user_id = $branch->user_id;
           $objs->branch_id = $request['branch_id'];
           $objs->driver_id = $request['driver_id'];
           $objs->code_order = $request['code_order'];
           $objs->dri_time = $request['dri_time'];
           $objs->amount = $request['amount'];
           $objs->price = $request['price'];
           $objs->b_name = $branch->name_branch;
           $objs->b_recive_name = $branch->admin_branch;
           $objs->b_phone = $branch->phone;
           $objs->b_address = $branch->address_branch;
           $objs->o_name = $user->name;
           $objs->dri_name = $dri->name;
           $objs->dri_type = $dri->type_car;
           $objs->dri_no_car = $dri->no_car;
           $objs->dri_phone = $dri->phone;
           $objs->dri_img = $dri->avatar;
           $objs->save();

           return redirect(url('admin/myorder'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
            ->where('role_user.role_id', 4)
            ->orderby('role_user.id', 'asc')
            ->get();
            $data['user'] = $user;

        $branch = branch::all();

        $data['branch'] = $branch;

        $objs = order::find($id);
        $data['url'] = url('admin/myorder/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.orders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $this->validate($request, [
            'branch_id' => 'required',
            'driver_id' => 'required',
            'code_order' => 'required',
            'dri_time' => 'required',
            'amount' => 'required',
            'price' => 'required'
           ]);

           $branch = branch::where('id', $request['branch_id'])->first();
           $user = User::where('id', $branch->user_id)->first();
           $dri = User::where('id', $request['driver_id'])->first();

           $objs = order::find($id);
           $objs->user_id = $branch->user_id;
           $objs->branch_id = $request['branch_id'];
           $objs->driver_id = $request['driver_id'];
           $objs->code_order = $request['code_order'];
           $objs->dri_time = $request['dri_time'];
           $objs->amount = $request['amount'];
           $objs->price = $request['price'];
           $objs->b_name = $branch->name_branch;
           $objs->b_recive_name = $branch->admin_branch;
           $objs->b_phone = $branch->phone;
           $objs->b_address = $branch->address_branch;
           $objs->o_name = $user->name;
           $objs->dri_name = $dri->name;
           $objs->dri_type = $dri->type_car;
           $objs->dri_no_car = $dri->no_car;
           $objs->dri_phone = $dri->phone;
           $objs->dri_img = $dri->avatar;
           $objs->save();

           return redirect(url('admin/myorder/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
