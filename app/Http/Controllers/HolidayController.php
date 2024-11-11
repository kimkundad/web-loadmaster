<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\holiday;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = holiday::paginate(15);
        $objs->setPath('');
        return view('admin.holiday.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/holiday');
        return view('admin.holiday.create', $data);
    }


    public function api_post_status_holiday(Request $request){

        $user = holiday::findOrFail($request->user_id);

              if($user->status == 1){
                  $user->status = 0;
              } else {
                  $user->status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // startdate
        $this->validate($request, [
            'name' => 'required',
            'day' => 'required',
            'image' => 'required'
        ]);


          $image = $request->file('image');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
          $img = Image::make($image->getRealPath());
          $img->resize(600, 285, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('loadmaster/holiday/'.$image->hashName(), $img, 'public');


        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }

           $objs = new holiday();
           $objs->name = $request['name'];
           $objs->day = $request['day'];
           $objs->image = $image->hashName();
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/holiday'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = holiday::find($id);
        $data['url'] = url('admin/holiday/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.holiday.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'day' => 'required',
        ]);


           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

           if($image == NULL){

           $objs = holiday::find($id);
           $objs->name = $request['name'];
           $objs->day = $request['day'];
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('holidays')
          ->where('id', $id)
          ->first();

           $storage = Storage::disk('do_spaces');
           $storage->delete('loadmaster/holiday/'. $img->image, 'public'); // Assuming 'image' holds the path


           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(600, 285, function ($constraint) {
           $constraint->aspectRatio();
         });
         $img->stream();
         Storage::disk('do_spaces')->put('loadmaster/holiday/'.$image->hashName(), $img, 'public');

           $objs = holiday::find($id);
           $objs->name = $request['name'];
           $objs->day = $request['day'];
           $objs->image = $image->hashName();
           $objs->status = $status;
           $objs->save();

           }

           return redirect(url('admin/holiday/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $objs = DB::table('holidays')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('loadmaster/holiday/'. $objs->image, 'public'); // Assuming 'image' holds the path
            }

        $obj = holiday::find($id);
        $obj->delete();

        return redirect(url('admin/holiday/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
