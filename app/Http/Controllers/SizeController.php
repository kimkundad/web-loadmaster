<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\size;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = size::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.sizes.index', compact('objs'));
    }


    public function api_post_status_size(Request $request){

        $user = size::findOrFail($request->user_id);

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['method'] = "post";
            $data['url'] = url('admin/size');
            return view('admin.sizes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
           ]);


           $objs = new size();
           $objs->name = $request['name'];
           $objs->price = $request['price'];
           $objs->save();

           return redirect(url('admin/size'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = size::find($id);
        $data['url'] = url('admin/size/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.sizes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
           ]);

           $objs = size::find($id);
           $objs->name = $request['name'];
           $objs->price = $request['price'];
           $objs->save();

           return redirect(url('admin/size/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function del_size($id)
    {
        //
        $obj = size::find($id);
        $obj->delete();

        return redirect(url('admin/size/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
