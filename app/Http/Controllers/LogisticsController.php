<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logis;
use Illuminate\Support\Facades\DB;


class LogisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objs = logis::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.logis.index', compact('objs'));
    }

    public function api_post_status_logis(Request $request){

        $user = logis::findOrFail($request->user_id);

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
            $data['url'] = url('admin/logis');
            return view('admin.logis.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'province' => 'required',
            'tenbox' => 'required',
            'twentybox' => 'required',
            'thirtybox' => 'required',
            'fortybox' => 'required',
            'fiftybox' => 'required',
            'sixtybox' => 'required',
            'type' => 'required',
           ]);


           $objs = new logis();
           $objs->province = $request['province'];
           $objs->tenbox = $request['tenbox'];
           $objs->twentybox = $request['twentybox'];
           $objs->thirtybox = $request['thirtybox'];
           $objs->fortybox = $request['fortybox'];
           $objs->fiftybox = $request['fiftybox'];
           $objs->sixtybox = $request['sixtybox'];
           $objs->type = $request['type'];
           $objs->save();

           return redirect(url('admin/logis'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = logis::find($id);
        $data['url'] = url('admin/logis/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.logis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'province' => 'required',
            'tenbox' => 'required',
            'twentybox' => 'required',
            'thirtybox' => 'required',
            'fortybox' => 'required',
            'fiftybox' => 'required',
            'sixtybox' => 'required',
            'type' => 'required',
           ]);


           $objs = logis::find($id);
           $objs->province = $request['province'];
           $objs->tenbox = $request['tenbox'];
           $objs->twentybox = $request['twentybox'];
           $objs->thirtybox = $request['thirtybox'];
           $objs->fortybox = $request['fortybox'];
           $objs->fiftybox = $request['fiftybox'];
           $objs->sixtybox = $request['sixtybox'];
           $objs->type = $request['type'];
           $objs->save();

           return redirect(url('admin/logis/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function del_logis(string $id)
    {
        //
        $obj = logis::find($id);
        $obj->delete();

        return redirect(url('admin/logis/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
