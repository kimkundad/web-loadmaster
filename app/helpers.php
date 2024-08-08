<?php

use Illuminate\Support\Facades\DB;
use App\Models\setting;
use App\Models\type_contact;
use App\Models\category;
use App\Models\subcat;
use App\Models\brand;
use App\Models\product;


function get_phone(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->phone;
}

function get_title_facebook(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->facebook_title;
}

function get_facebook_detail(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->facebook_detail;
}

function get_facebook_img(){
    $id = 1;
    $objs = setting::find($id);
    return url('media/').'/'.$objs->facebook_image;
}

function get_phone2(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->banner_point;
}

function get_youtube(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->youtube;
}

function get_line(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->line_oa_url;
}

function get_email(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->email;
}

function get_facebook(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->facebook_url;
}

function get_fax(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->banner_his;
}

function type_contact(){
    $objs = type_contact::where('status', 1)->get();
    return $objs;
}

function get_category(){
    $objs = subcat::where('status', 1)->get();
    return $objs;
}

function get_brand(){
    $objs = brand::where('status', 1)->get();

    if($objs){
        foreach($objs as $u ){
            $sub = product::where('brand', $u->id)->where('status', 1)->count();
            $u->option = $sub;
        }
    }

    return $objs;
}

function get_data_category(){

    $objs = category::where('status', 1)->get();
    if($objs){
        foreach($objs as $u ){
            $sub = subcat::where('cat_id', $u->id)->where('status', 1)->get();
            $u->option = $sub;
        }
    }
    
    return $objs;
}

function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate));
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear ";
}
