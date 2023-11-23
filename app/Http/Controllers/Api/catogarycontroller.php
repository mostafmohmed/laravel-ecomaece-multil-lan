<?php

namespace App\Http\Controllers\Api;

use App\Genrialtrait as AppGenrialtrait;
use App\Http\Controllers\Controller;
use App\Models\Main_Catagotiry;
use App\Trait\Genrialtrait;
use Illuminate\Http\Request;

class catogarycontroller extends Controller
{
    
use AppGenrialtrait ;
       
    function index(){
        $r=app()->getLocale();
         
        $catagory=Main_Catagotiry::where('translation_lang',$r)->  get();
        return response()->json($catagory);
    }
    function get_catogry(Request $request){
        
        $catagory=Main_Catagotiry::find($request->id);
if(!$catagory)
 return  $this-> returnerror('10000' ,'هذا القسم غي موجود');
        return  $this-> returnData('catagory',$catagory);
    }
}
