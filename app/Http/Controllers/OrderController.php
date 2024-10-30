<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\branch;
use App\Models\User;
use App\Models\logis;
use App\Models\ImgStep;
use PDF;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = order::orderBy('id', 'desc')->paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.orders.index', compact('objs'));
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'ใบเสร็จรับเงิน',
        ];

        $pdf = \PDF::loadView('admin.orders.document', $data)
                ->setPaper('a4', 'portrait'); // Optional: Set paper size and orientation
               return view('admin.orders.document', $data);
             // return $pdf->stream('document.pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        $logis = logis::all();

        $data['branch'] = $branch;
        $data['logis'] = $logis;
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
            'dri_time' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'province2' => 'required',
            'b_address' => 'required',
            'b_recive_name' => 'required',
            'b_phone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'cus_id' => 'required',
            'sizepro' => 'required',
            'typeService' => 'required',
            'dri_date' => 'required'
           ]);

           $count = order::count();
           $formattedCount = str_pad($count, 6, '0', STR_PAD_LEFT);  // Result: "0025"
           $code_order = 'LM'.date('Y').''.date('m').date('d').''.$formattedCount;

           $branch = branch::where('id', $request['branch_id'])->first();
           $user = User::where('id', $request['cus_id'])->first();
           $dri = User::where('id', $request['driver_id'])->first();

           if($request['branch_id'] !== 0){

           $objs = new order();
           $objs->user_id = $request['cus_id'];
           $objs->branch_id = $request['branch_id'];
           $objs->province2 = $request['province2'];
           $objs->province = 'จ.สมุทรปราการ';
           $objs->driver_id = $request['driver_id'];
           $objs->code_order = $code_order;
           $objs->dri_time = $request['dri_time'];
           $objs->amount = $request['amount'];
           $objs->price = $request['price'];
           $objs->b_name = $request['b_recive_name'];
           $objs->b_recive_name = $request['b_recive_name'];
           $objs->b_phone = $request['b_phone'];
           $objs->b_address = $request['b_address'];
           $objs->remark_re = $request['remark_re'];
           $objs->latitude2 = $request['latitude'];
           $objs->longitude2 = $request['longitude'];
           $objs->type = $request['typeService'];
           $objs->size = $request['sizepro'];
           $objs->waffles = $request['waffles'];
           $objs->o_name = $user->name;
           $objs->latitude = '13.5116094';
           $objs->longitude = '100.68715';
           $objs->dri_date = $request['dri_date'];

           $objs->name_re = $request['b_recive_name'];
           $objs->phone_re = $request['b_phone'];
           $objs->adddress_re = $request['b_address'];

           if($dri){
            $objs->dri_name = $dri->name;
            $objs->dri_type = $dri->type_car;
            $objs->dri_no_car = $dri->no_car;
            $objs->dri_phone = $dri->phone;
            $objs->dri_img = $dri->avatar;
           }

           $objs->save();

           }else{


            $objs = new order();
           $objs->user_id = $request['cus_id'];
           $objs->branch_id = $request['branch_id'];
           $objs->province2 = $request['province2'];
           $objs->driver_id = $request['driver_id'];
           $objs->province = 'จ.สมุทรปราการ';
           $objs->code_order = $code_order;
           $objs->dri_time = $request['dri_time'];
           $objs->amount = $request['amount'];
           $objs->price = $request['price'];
           $objs->b_name = $branch->name_branch;
           $objs->b_recive_name = $branch->admin_branch;
           $objs->b_phone = $branch->phone;
           $objs->b_address = $branch->address_branch;
           $objs->remark_re = $request['remark_re'];
           $objs->latitude2 = $request['latitude'];
           $objs->longitude2 = $request['longitude'];
           $objs->type = $request['typeService'];
           $objs->size = $request['sizepro'];
           $objs->waffles = $request['waffles'];
           $objs->o_name = $user->name;
           $objs->dri_date = $request['dri_date'];

           $objs->latitude = '13.5116094';
           $objs->longitude = '100.68715';

           $objs->name_re = $request['b_recive_name'];
           $objs->phone_re = $request['b_phone'];
           $objs->adddress_re = $request['b_address'];

           if($dri){
            $objs->dri_name = $dri->name;
            $objs->dri_type = $dri->type_car;
            $objs->dri_no_car = $dri->no_car;
            $objs->dri_phone = $dri->phone;
            $objs->dri_img = $dri->avatar;
           }

           $objs->save();

           }


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
            'dri_time' => 'required',
            'amount' => 'required',
            'price' => 'required'
           ]);

           $branch = branch::where('id', $request['branch_id'])->first();
           $user = User::where('id', $request['cus_id'])->first();
           $dri = User::where('id', $request['driver_id'])->first();

           $objs = order::find($id);
           $objs->user_id = $request['cus_id'];
           $objs->branch_id = $request['branch_id'];
           $objs->province2 = $request['province2'];
           $objs->driver_id = $request['driver_id'];
           $objs->dri_time = $request['dri_time'];
           $objs->amount = $request['amount'];
           $objs->price = $request['price'];
           $objs->b_name = $request['b_recive_name'];
           $objs->b_recive_name = $request['b_recive_name'];
           $objs->b_phone = $request['b_phone'];
           $objs->b_address = $request['b_address'];
           $objs->remark_re = $request['remark_re'];
           $objs->latitude2 = $request['latitude'];
           $objs->longitude2 = $request['longitude'];
           $objs->type = $request['typeService'];
           $objs->size = $request['sizepro'];
           $objs->waffles = $request['waffles'];
           $objs->o_name = $user->name;
           $objs->dri_date = $request['dri_date'];

           $objs->latitude = '13.5116094';
           $objs->longitude = '100.68715';

           $objs->name_re = $request['b_recive_name'];
           $objs->phone_re = $request['b_phone'];
           $objs->adddress_re = $request['b_address'];

           if($dri){
            $objs->dri_name = $dri->name;
            $objs->dri_type = $dri->type_car;
            $objs->dri_no_car = $dri->no_car;
            $objs->dri_phone = $dri->phone;
            $objs->dri_img = $dri->avatar;
           }

           $objs->order_status = $request['order_status'];
           $objs->save();

           return redirect(url('admin/myorder/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $obj = news::find($id);
        $obj->delete();

        return redirect(url('admin/news/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
