<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $objs->bankName = $request['bankName'];
            $objs->bankNo = $request['bankNo'];
            $objs->bankType = $request['bankType'];
            $objs->bankMain = $request['bankMain'];
            $objs->save();


            $image = $request->file('avatar');

        if($image != NULL){

            $storage = Storage::disk('do_spaces');
            $storage->delete('loadmaster/bank/' . $objs->bankImage, 'public');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(80, 80, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('loadmaster/bank/'.$image->hashName(), $img, 'public');

            $obj = setting::find($id);
            $obj->bankImage = 'https://kimspace2.sgp1.cdn.digitaloceanspaces.com/loadmaster/bank/'.$image->hashName();
            $obj->save();

            }


            return redirect(url('admin/setting/'))->with('edit_success','อัพเดทข้อมูลสำเร็จ');

    }


}
