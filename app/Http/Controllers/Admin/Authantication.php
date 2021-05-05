<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Traits\GenerailTrait;
use Validator;


class Authantication extends Controller
{
    use GenerailTrait; 

    public function login(Request $req)
    {   
    	try{
           $rule = [

	         'email' => 'required|exists:admins,email',
	         'password' => 'required'

	    	];
	    	
	    	$vld = Validator::make($req->all(),$rule) ;

		    if($vld->fails()) return $this->getVidatorErrors($vld);

		    
            $admin = Admin::where('email', $req->email)->first();

		    if (! $admin || ! Hash::check($req->password, $admin->password)) {
		        
		        return $this->retrunErros(['password' => [__('erorr.incorrect')]]);
		    }

		     foreach ($admin->tokens as $token) {
		     	$token->delete();
		     }

            $token =  $admin->createToken($req->email)->plainTextToken;

            $data = ['token'=> $token , 'auth' => $admin];
		    	
	    	return $this->getVidatorSucess($data);
	    }


    	catch(\Exception $e){

    		return $this->retrunErros($e);
    	}

    }
}
