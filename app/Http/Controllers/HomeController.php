<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Facades\DB;
use App\Models\contact;
use Exception;

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



      public function getOrderByID(Request $request){

        try{


            $order = DB::table('orders')
            ->where('code_order', $request->code_order)
            ->first();

            $timeLine = [];

            if ($order) {
                if ($order->order_status == 1) {
                    // Timeline for code_order = 1

                    if ($order->status_dri == 1) {
                    $timeLine = [
                        [
                            'id' => '1',
                            'date' => '04-11-2024 21:56',
                            'status' => 'อยู่ระหว่างการขนส่ง',
                            'description' => 'พัสดุออกจากคลังสินค้า ไปยัง จ.สมุทรปราการ - '. $order->b_address,
                            'active' => true,
                            'icon' => 'local-shipping',
                            'statusEn' => 'The product is in transit.',
                            'descriptionEn' => 'Parcels leave the warehouse to Samut Prakan Province. - '. $order->b_address,
                            'statusCn' => '在途中',
                            'descriptionCn' => '包裹离开仓库发往北榄府。 - '. $order->b_address,
                        ],
                        [
                            'id' => '2',
                            'date' => '04-11-2024 21:56',
                            'status' => 'กำลังเตรียมพัสดุ',
                            'description' => 'คนขับรถอยู่คลังสินค้าเพื่อโหลดสินค้าขึ้นรถ',
                            'active' => false,
                            'icon' => 'inventory',
                            'statusEn' => 'Preparing the package',
                            'descriptionEn' => 'Drivers are at the warehouse to load products into vehicles.',
                            'statusCn' => '准备包裹',
                            'descriptionCn' => '司机在仓库将产品装载到车辆上。',
                        ],
                        [
                            'id' => '3',
                            'date' => $order->created_at,
                            'status' => 'กำลังดำเนินการ',
                            'description' => 'ระบบกำลังหาคนขับรถออกไปรับพัสดุจากคลังสินค้า',
                            'active' => false,
                            'icon' => 'pending',
                            'statusEn' => 'in progress',
                            'descriptionEn' => 'The system is looking for a driver to pick up a package from the warehouse.',
                            'statusCn' => '进行中',
                            'descriptionCn' => '系统正在寻找司机从仓库提取包裹。',
                        ],
                    ];
                }else{

                    $timeLine = [
                        [
                            'id' => '1',
                            'date' => '04-11-2024 21:56',
                            'status' => 'อยู่ระหว่างการขนส่ง',
                            'description' => 'พัสดุออกจากคลังสินค้า ไปยัง จ.สมุทรปราการ - '. $order->b_address,
                            'active' => true,
                            'icon' => 'local-shipping',
                            'statusEn' => 'The product is in transit.',
                            'descriptionEn' => 'Parcels leave the warehouse to Samut Prakan Province. - '. $order->b_address,
                            'statusCn' => '在途中',
                            'descriptionCn' => '包裹离开仓库发往北榄府。 - '. $order->b_address,
                        ],
                        [
                            'id' => '2',
                            'date' => '04-11-2024 21:56',
                            'status' => 'กำลังเตรียมพัสดุ',
                            'description' => 'คนขับรถอยู่คลังสินค้าเพื่อโหลดสินค้าขึ้นรถ',
                            'active' => false,
                            'icon' => 'inventory',
                            'statusEn' => 'Preparing the package',
                            'descriptionEn' => 'Drivers are at the warehouse to load products into vehicles.',
                            'statusCn' => '准备包裹',
                            'descriptionCn' => '司机在仓库将产品装载到车辆上。',
                        ],
                        [
                            'id' => '3',
                            'date' => $order->created_at,
                            'status' => 'กำลังดำเนินการ',
                            'description' => 'ระบบกำลังหาคนขับรถออกไปรับพัสดุจากคลังสินค้า',
                            'active' => false,
                            'icon' => 'pending',
                            'statusEn' => 'in progress',
                            'descriptionEn' => 'The system is looking for a driver to pick up a package from the warehouse.',
                            'statusCn' => '进行中',
                            'descriptionCn' => '系统正在寻找司机从仓库提取包裹。',
                        ],
                    ];

                }


                } else if ($order->order_status == 2) {
                    // Timeline for code_order = 2
                    $timeLine = [
                        [
                            'id' => '4',
                            'date' => $order->time_step3,
                            'status' => 'จัดส่งสำเร็จ',
                            'description' => 'พัสดุถูกจัดส่งสำเร็จถึงปลายทาง',
                            'active' => true,
                            'icon' => 'done',
                            'statusEn' => 'Successful delivery',
                            'descriptionEn' => 'The package was successfully delivered to its destination.',
                            'statusCn' => '发货成功',
                            'descriptionCn' => '包裹已成功送达目的地。',
                        ],
                        [
                            'id' => '1',
                            'date' => '04-11-2024 21:56',
                            'status' => 'อยู่ระหว่างการขนส่ง',
                            'description' => 'พัสดุออกจากคลังสินค้า ไปยัง จ.สมุทรปราการ - '. $order->b_address,
                            'active' => true,
                            'icon' => 'local-shipping',
                            'statusEn' => 'The product is in transit.',
                            'descriptionEn' => 'Parcels leave the warehouse to Samut Prakan Province. - '. $order->b_address,
                            'statusCn' => '在途中',
                            'descriptionCn' => '包裹离开仓库发往北榄府。 - '. $order->b_address,
                        ],
                        [
                            'id' => '2',
                            'date' => '04-11-2024 21:56',
                            'status' => 'กำลังเตรียมพัสดุ',
                            'description' => 'คนขับรถอยู่คลังสินค้าเพื่อโหลดสินค้าขึ้นรถ',
                            'active' => false,
                            'icon' => 'inventory',
                            'statusEn' => 'Preparing the package',
                            'descriptionEn' => 'Drivers are at the warehouse to load products into vehicles.',
                            'statusCn' => '准备包裹',
                            'descriptionCn' => '司机在仓库将产品装载到车辆上。',
                        ],
                        [
                            'id' => '3',
                            'date' => $order->created_at,
                            'status' => 'กำลังดำเนินการ',
                            'description' => 'ระบบกำลังหาคนขับรถออกไปรับพัสดุจากคลังสินค้า',
                            'active' => false,
                            'icon' => 'pending',
                            'statusEn' => 'in progress',
                            'descriptionEn' => 'The system is looking for a driver to pick up a package from the warehouse.',
                            'statusCn' => '进行中',
                            'descriptionCn' => '系统正在寻找司机从仓库提取包裹。',
                        ],

                    ];
                } else if ($order->order_status == 0) {
                    // Timeline for code_order = 0
                    $timeLine = [
                        [
                            'id' => '3',
                            'date' => $order->created_at,
                            'status' => 'กำลังดำเนินการ',
                            'description' => 'ระบบกำลังหาคนขับรถออกไปรับพัสดุจากคลังสินค้า',
                            'active' => false,
                            'icon' => 'pending',
                            'statusEn' => 'in progress',
                            'descriptionEn' => 'The system is looking for a driver to pick up a package from the warehouse.',
                            'statusCn' => '进行中',
                            'descriptionCn' => '系统正在寻找司机从仓库提取包裹。',
                        ],
                    ];
                }
            }


            return response()->json([
                'order' => $order,
                'timeline' => $timeLine
            ]);

        }catch(Exception $e){
            return response()->json(['success'=>false,'message'=>'something went wrong']);
        }

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
