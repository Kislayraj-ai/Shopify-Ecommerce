<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrderDetailsModel;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
     public function openCartView(){

        return view('CartView') ;
     }

     public function addProductToCart(Request $req){

        $sCartData =  $req->input('cartData') ;
        
        $sCardId  = CartModel::create([
            "product" => $sCartData['product'] ,
            "category" =>  $sCartData['category'] ,
            "quantity" =>  $sCartData['quantity'] ,
            "price" =>  $sCartData['price'] ,
            "added_by" =>  session('user_id') ,
        ]) ;

       try{
        if($sCardId){
            //! populate order details 
           $sUserName =  substr(session('user_name') , 0, 3);
           $sCurrTime = time() ;
           $sCreateOrderNo = 'ORD' . strtoupper($sUserName) .  $sCurrTime ;

           $slastInsertedCard  = $sCardId->card_id ;
    
           $sOrderId = OrderDetailsModel::create([
            'order_no' =>  $sCreateOrderNo ,
            'card_id'  =>   $slastInsertedCard ,
            'added_by' =>  session('user_id') ,
           ]) ;
         
            if($sOrderId)
               return response()->json(['message' => 'product added to cart']);
            else return false ;
            
        }else return false ;
      }catch(Exception $e){
         echo $e->getMessage() ; 
         return false ;
      }

     }


     public function fetchCartData(){


        $sData = CartModel::leftJoin('all_products' ,'product' , "=" ,'all_products.id'  )
        ->leftJoin('categories','category','=', 'categories.id' )
        ->leftJoin('order_details','carts.card_id','=', 'order_details.card_id' )
        ->where('carts.quantity',">", 0 )
        ->where('carts.added_by', '=' , session('user_id'))
         ->where('order_details.completed', '=' , 0)
        ->whereNull('order_details.deleted_at')
        ->select('categories.*' , 'all_products.*' ,'carts.price' , 'carts.quantity' ,'order_details.order_id','order_details.order_no')->get();
        
        return $sData ;
        
     }

     public function increaseProductQuantity(Request $req){
        
        $product_id = $req->input('product_id') ;
        $quantity = $req->input('quantity') ;
        $flag = $req->input('flag') ;

      if($flag == 0){
        $sGet = CartModel::where('product', $product_id)->increment('quantity', $quantity);
        if($sGet)
        return "Quantity Increased " ;
      }
    
      //! to decreased the cart order for particular product 
       if($flag == 1){
         $sProduct =  CartModel::where('product', $product_id) ;
         $sGet =     $sProduct->decrement('quantity', $quantity);
         $sGet =     $sProduct ->get();
         $sQuantity  = $sGet[0]['quantity'] ;
          
         //! delete the product from the cart if quantity reaches zero
          if((int)$sQuantity  == 0 ){
            CartModel::where('product', $product_id)->delete();
          }

          if($sGet)
          return "Quantity Decreased " ;
       }       
     }


     public function removeProductQuantity(Request  $req){
       $sProductId = $req->input('productId');
       
       $sFind = CartModel::where('product','=', $sProductId ) 
       ->select('card_id')->get() ;
       
       $sCartId = $sFind->first();
       $sCartId =  $sCartId->card_id ;


      $sGet = OrderDetailsModel::where('card_id','=' , $sCartId ) ;
 
      $sGet->delete() ;

      CartModel::where('product', $sProductId)->delete();


      return true ;
      
     }
     
}