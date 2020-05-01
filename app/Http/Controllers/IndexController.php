<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function welcome()
    {
    	return view('homepage.welcome');
    }

    public function about(){
    	return view('homepage.about');
    }

    public function contact(){
    	return view('homepage.contact');
    }

    public function profile(){
        // $progress = SkillScore::where('id_user',Auth::id())->get();
    	// $score = Score::where('user_id', Auth::id())->get();
        return view('homepage.profile');
    }
}
