<?php
namespace App\Http\Traits;


trait GenerailTrait {

     

    public function retrunErros($msg)
     {
     	return response()->json(['status' => false , 'messages' => $msg]);
     } 



    public function getVidatorSucess($vld,$msg='')
    {
    	
    
    	return response()->json([
          
          'status'=>true,
          'data'=> $vld,
          'messages'=> $msg
          
          
    	]);

    }

    public function getVidatorErrors($vld)
    {
    	
    	$files = $vld->errors()->toArray();

    	return response()->json([
          'status'=>false,
          'messages'=>$files
          
    	]);
    }

    public function getErrorsFilds($vld)
    {
    	
    	$files = array_keys($vld->errors()->toArray());

    	return $files;
    }



}
