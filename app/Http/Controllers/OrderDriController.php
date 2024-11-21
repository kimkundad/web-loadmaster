<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\branch;
use App\Models\User;
use App\Models\logis;
use App\Models\ImgStep;
use PDF;
use App\Events\OrderStatusUpdated;

use Illuminate\Support\Facades\DB;

class OrderDriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = order::where('send_status', 1)->orderBy('id', 'desc')->paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.ordersDri.index', compact('objs'));
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
        $ImgStep1 = ImgStep::where('order_id', $id)->where('stepNo', 1)->get();
        $ImgStep2 = ImgStep::where('order_id', $id)->where('stepNo', 2)->get();
        $ImgStep3 = ImgStep::where('order_id', $id)->where('stepNo', 3)->get();
       // dd($ImgStep1);
        $data['ImgStep1'] = $ImgStep1;
        $data['ImgStep2'] = $ImgStep2;
        $data['ImgStep3'] = $ImgStep3;

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
            ->get();

            $data['cus'] = $objs;

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
        $logis = logis::all();
        $data['logis'] = $logis;

        $objs = order::find($id);
        $data['url'] = url('admin/myorderDri/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.ordersDri.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

      //  dd($request['driver_id']);
           $dri = User::where('id', $request['driver_id'])->first();

           $objs = order::find($id);
           if($dri){
            $objs->driver_id = $request['driver_id'];
            $objs->dri_name = $dri->name;
            $objs->dri_type = $dri->type_car;
            $objs->dri_no_car = $dri->no_car;
            $objs->dri_phone = $dri->phone;
            $objs->dri_img = $dri->avatar;
           }
           $objs->order_status = $request['order_status'];
           $objs->save();

           if($dri){
            $obj = order::find($id);
           event(new OrderStatusUpdated($obj));
           }

         //  dd($objs);

           return redirect(url('admin/myorderDri/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
