<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
	public function index(){
		$result = DB::select("SELECT * from students");
		print_r($result[0]->SFIRST);
		// return view('home');
	}

	public function register_form(){
		return view('register');
	}

	public function register(Request $request){
	
	$validator = Validator::make($request->all(),[
			'username'=>'min:5|max:30',
			'email'=>'email',
			'pass'=>'min:10',
			'pass2'=>'same:pass'
		],[
			'username.min'=>'Името е прекалено късо',
			'username.max'=>'Името е прекалено дълго',
			'email.email'=>'Въведете валиден email',
			'pass.min'=>'Паролата е прекалено къса',
			'pass2.same'=>'Паролите не съвпадат'
		]);

			if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();                      }

        return redirect()->route('register');
	}
}
