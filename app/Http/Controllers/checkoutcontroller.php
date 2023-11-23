<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produect;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutcontroller extends Controller
{
    function checkout(){
        return view('frontt.checkout');
    }


    function palcher(Request $request){
        Order::create([
            ...$request->all(),
         'user_id'=>Auth::id()
        ]);
    
   

$cartitem=Cart::where('userr_id',Auth::id())->get();
foreach($cartitem as $item){
    OrderItem::create(
        [
            'order_id'=>$item-> id,
            'protect_id'=>  $item-> produect_id,
            'price'=>$item->price,
            // 'price'=>$cartitem
        ]
        );
        $pro=Produect::where('id',$item->produect_id)->first();
      
        $pro->qua=$pro->qua-$item->qua;
        $pro->update();
}
// if(Auth::user()->adress1==null){
    
// }
$cartitems=Cart::where('userr_id',Auth::id())->get();
Cart::destroy($cartitems);
    }
}
