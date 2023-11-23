<?php

namespace App\Http\Controllers\Api;

use App\Genrialtrait;
use App\Http\Controllers\Controller;
use Exception;
//use Illuminate\Http\Client\Request as ClientRequest;
//use Illuminate\Http\Client\Request as ClientRequest;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class authcontroller extends Controller
{use Genrialtrait;
    public function login(Request $request)
    {
        
        $rules = [
            "email" => "required",
            "password" => "required"
    
        ];
        
        $validator = FacadesValidator::make($request->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            //dd( $code);
            return $this->returnValidationError($code, $validator);
        }
        $credentials = $request->only(['email', 'password']);

        $token = Auth::guard('api-admin')->attempt($credentials);
;
        if (!$token)
            return $this->returnError('E001', 'بيانات الدخول غير صحيحة');


            $admin = Auth::guard('api-admin')->user();
            $admin->token_password=$token ;
            return $this->returnData('admin',$admin);

       
    }

 public function logout(Request $re  ){
    //  body    مش    header  علشان اوصل 
    $token = $re -> header('auth-token');
    if($token){
// try{
//     JWTAuth::setToken($token)->invalidate();
// }catch(  Exception $e){
//     return 'error massage'.$e;
// }
              
        // return  'sucsess massage';
    }else{
        return 'error massage';
    }

    return  $token;
 }
    
}
