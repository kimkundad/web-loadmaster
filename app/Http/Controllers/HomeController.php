<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Facades\DB;
use App\Models\contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $blog = news::where('status', 1)->whereDate('startdate', '<=', date("Y-m-d"))->orderby('id', 'desc')->limit(3)->get();
        $data['blog'] = $blog;

        return view('welcome', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function news()
    {
        return view('news');
    }

    public function blog_detail($id){

        $objs = news::find($id);
        $data['objs'] = $objs;

        DB::table('news')
              ->where('id', $id)
              ->update(['view' => $objs->view+1]);

        return view('blog_detail', $data);
      }




      public function add_contact(Request $request){



        $secret=env('reCAPTCHA');
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

    //  dd($captcha_success);

    if($response["success"] == false) {

        return response()->json([
          'data' => [
            'status' => 100,
            'msg' => 'This user was not verified by recaptcha_1.',
            'data' => $response,
            'web' => $secret
          ]
        ]);

      }else{

           $objs = new contact();
           $objs->name = $request['name'];
           $objs->email = $request['email'];
           $objs->phone = $request['phone'];
           $objs->subject = $request['subject'];
           $objs->messenger = $request['massage'];
           $objs->save();





        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);
            }
    }

    public function contact()
    {
        return view('contact');
    }

    public function terms_and_conditions()
    {
        return view('terms_and_conditions');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms_of_use()
    {
        return view('terms_of_use');
    }

    public function track()
    {
        return view('track');
    }




}
