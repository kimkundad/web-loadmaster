<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    //
    public function index(){
        $id = 1;
        $objs = setting::find($id);
        $data['objs'] = $objs;
        return view('admin.setting.index', $data);
    }


    public function post_setting(Request $request){

          $id = 1;

            $objs = setting::find($id);
            $objs->box_service1 = $request['box_service1'];
            $objs->box_service2 = $request['box_service2'];
            $objs->box_service3 = $request['box_service3'];
            $objs->tax = $request['tax'];
            $objs->save();


            return redirect(url('admin/setting/'))->with('edit_success','อัพเดทข้อมูลสำเร็จ');

    }


}
