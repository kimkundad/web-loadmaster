<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function news()
    {
        return view('news');
    }

    public function blog_detail()
    {
        return view('blog_detail');
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




}
