<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index(){

        $objs = DB::table('contacts')->paginate(15);

            $objs->setPath('');

        return view('admin.contact.index', compact('objs'));

    }

    public function api_post_status_contact(Request $request){

        $user = contact::findOrFail($request->user_id);

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

}
