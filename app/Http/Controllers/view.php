<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class view extends Controller
{
    function get($prottect_id){
          $protect=Produect::find($prottect_id);
        return
        view('frontt.single-protect',compact('protect'));
    }
    function bestsallry(){
        $topSellers = DB::table('product_skuses')->join('produects', 'product_skuses.prottect_id', '=', 'produects.id')
        ->orderBy('product_skuses.prottect_id','desc')
        ->limit(5)
        ->get()
        ->all();
        // dd($topSellers[0]->prottect_id;
return   
view('frontt.home',compact('topSellers'));
   
    }
  
}
