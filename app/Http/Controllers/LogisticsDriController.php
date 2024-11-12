<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logis;
use Illuminate\Support\Facades\DB;

class LogisticsDriController extends Controller
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
        return view('admin.logisDri.index', compact('objs'));
    }


    public function api_post_status_status_Per(Request $request){

        $user = logis::findOrFail($request->user_id);

              if($user->status_Per == 1){
                  $user->status_Per = 0;
              } else {
                  $user->status_Per = 1;
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
        $objs = logis::find($id);
        $data['url'] = url('admin/logisDri/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.logisDri.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $this->validate($request, [
            'DriService_1' => 'required',
            'DriService_2' => 'required',
            'DriService_3' => 'required'
           ]);

           $status_Per = 0;
            if(isset($request['status_Per'])){
                if($request['status_Per'] == 1){
                    $status_Per = 1;
                }
            }

           $objs = logis::find($id);
           $objs->DriService_1 = $request['DriService_1'];
           $objs->DriService_2 = $request['DriService_2'];
           $objs->DriService_3 = $request['DriService_3'];
           $objs->status_Per = $status_Per;
           $objs->save();

           return redirect(url('admin/logisDri/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
