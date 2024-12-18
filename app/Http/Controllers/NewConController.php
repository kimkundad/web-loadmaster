<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = news::paginate(15);
        $objs->setPath('');
        return view('admin.news.index', compact('objs'));
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function upload_img(Request $request){

        $image = $request->file('image');
        $pathaa = 'img/all_image/';
              $filename = time()."-".$image->getClientOriginalName();
              $image->move($pathaa, $filename);

        echo url('img/all_image/'.$filename);
      }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/news');
        return view('admin.news.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function api_post_status_news(Request $request){

        $user = news::findOrFail($request->user_id);

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


    public function store(Request $request)
    {

        // startdate
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'detail' => 'required',
            'startdate' => 'required',
            'image' => 'required'
        ]);


          $image = $request->file('image');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
          $img = Image::make($image->getRealPath());
          $img->resize(600, 285, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('loadmaster/news/'.$image->hashName(), $img, 'public');


        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }

           $objs = new news();
           $objs->title = $request['title'];
           $objs->sub_title = $request['sub_title'];
           $objs->detail = $request['detail'];
           $objs->type = $request['type'];
           $objs->startdate = $request['startdate'];
           $objs->image = $image->hashName();
           $objs->type = 0;
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/news'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objs = news::find($id);
        $data['url'] = url('admin/news/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'detail' => 'required',
            'startdate' => 'required'
           ]);

           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

           if($image == NULL){

           $objs = news::find($id);
           $objs->title = $request['title'];
           $objs->sub_title = $request['sub_title'];
           $objs->detail = $request['detail'];
           $objs->type = $request['type'];
           $objs->startdate = $request['startdate'];
           $objs->type = 0;
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('news')
          ->where('id', $id)
          ->first();

           $storage = Storage::disk('do_spaces');
           $storage->delete('loadmaster/news/'. $img->image, 'public'); // Assuming 'image' holds the path


           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(600, 285, function ($constraint) {
           $constraint->aspectRatio();
         });
         $img->stream();
         Storage::disk('do_spaces')->put('loadmaster/news/'.$image->hashName(), $img, 'public');

           $objs = news::find($id);
           $objs->title = $request['title'];
           $objs->sub_title = $request['sub_title'];
           $objs->detail = $request['detail'];
           $objs->type = $request['type'];
           $objs->image = $image->hashName();
           $objs->startdate = $request['startdate'];
           $objs->type = 0;
           $objs->status = $status;
           $objs->save();

           }

           return redirect(url('admin/news/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_news($id)
    {
        //
        $objs = DB::table('news')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('loadmaster/news/'. $objs->image, 'public'); // Assuming 'image' holds the path
            }

        $obj = news::find($id);
        $obj->delete();

        return redirect(url('admin/news/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
