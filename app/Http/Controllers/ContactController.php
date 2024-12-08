<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\User;
use App\Models\Messages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\MessageSent;

class ContactController extends Controller
{
    //
    public function index(){

        $objs = DB::table('rooms')->select(
            'rooms.*',
            'rooms.id as id_r',
            'users.*',
            'users.id as id_q',
            )
            ->leftjoin('users', 'users.id',  'rooms.staff_id')
            ->orderBy('rooms.id', 'desc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.contact.index', compact('objs'));

    }


    public function chat($id){


        $user = DB::table('rooms')->select(
            'rooms.*',
            'rooms.id as id_r',
            'users.*',
            'users.id as id_q',
            )
            ->leftjoin('users', 'users.id',  'rooms.staff_id')
            ->where('rooms.id', $id)
            ->first();

      //  $objs = Messages::where('room_id', $id)->orderBy('id', 'desc')->get();
      //  dd($objs);

      $objs = DB::table('messages')->select(
        'messages.*',
        'messages.id as id_s',
        'users.*',
        'users.id as id_q',
        )
        ->leftjoin('users', 'users.id',  'messages.sender_id')
        ->where('messages.room_id', $id)
        ->get();

        return view('admin.contact.chat', compact('objs', 'user', 'id'));
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



     public function storeMessage(Request $request)
{
    // ตรวจสอบข้อมูลที่รับมา
    $validated = $request->validate([
        'room_id' => 'required|integer',
        'sender_id' => 'required|integer', // ตรวจสอบว่าผู้ส่งเป็นใคร
        'message' => 'nullable|string', // ข้อความอาจจะว่างได้ในกรณีที่มีรูปภาพ
        'image' => 'nullable|image|max:8048' // รองรับการอัปโหลดรูปภาพ ขนาดไม่เกิน 2MB
    ]);

    // กำหนดค่าเริ่มต้นสำหรับ URL รูปภาพ
    $imageUrl = null;

    // หากมีรูปภาพใน request
    if ($request->hasFile('image')) {
        $myImg = $request->file('image');

        // ปรับขนาดรูปภาพ
        $img = Image::make($myImg->getRealPath());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream(); // เตรียมรูปภาพสำหรับอัปโหลด

        // สร้างชื่อไฟล์ที่ไม่ซ้ำ
        $filename = time() . '_' . $myImg->getClientOriginalName();

        // อัปโหลดรูปภาพไปยัง DigitalOcean Spaces
        Storage::disk('do_spaces')->put(
            'loadmaster/chat/' . $filename,
            $img->__toString(), // ตรวจสอบให้แน่ใจว่ารูปภาพอยู่ในรูปแบบ string
            'public' // ทำให้ไฟล์สามารถเข้าถึงได้แบบสาธารณะ
        );

        // สร้าง URL รูปภาพ
        $imageUrl = 'https://kimspace2.sgp1.cdn.digitaloceanspaces.com/loadmaster/chat/' . $filename;
    }

    // บันทึกข้อความในฐานข้อมูล
    $message = Messages::create([
        'room_id' => $validated['room_id'],
        'sender_id' => $validated['sender_id'],
        'message' => $validated['message'] ?? '', // ใส่ข้อความว่างในกรณีที่ไม่มีข้อความ
        'image_url' => $imageUrl // เพิ่ม URL รูปภาพในฐานข้อมูล
    ]);

    // เพิ่มชื่อผู้ส่ง (หากจำเป็น)
    $message->sender_name = $request->sender_name;

    // ส่ง event ข้อความใหม่
    event(new MessageSent($message));

    return response()->json([
        'success' => true,
        'message' => $message,
    ]);
}

}
