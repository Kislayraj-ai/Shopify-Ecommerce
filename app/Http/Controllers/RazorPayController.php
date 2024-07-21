<?php

namespace App\Http\Controllers;

use App\Models\CartOrderConfirmationModel;
use App\Models\OrderDetailsModel;
use App\Models\UserProfileModel;
use App\Models\UsersDetailsModel;
use Illuminate\Http\Request;
use Razorpay\Api\Api ;

class RazorPayController extends Controller
{


    public $api ;
    public function __construct($foo = null)
    {

        $key_id = 'rzp_test_fyGCysJ8dv2A08' ;
        $key_secret = '7Nqq2G5UtNDm4OGu1Q1fkJC1' ;

        
        $this->api = new Api($key_id, $key_secret ) ;
    }

    
    public function makeOrderCheckout(Request $req){
        
    //     $this->validate($req , [
    //         'amount' => 'required|numeric' ,
    //    ]) ;
        $sTotalAmountValue = $req->input('totalValue') ;
        $sTotalQuantity = $req->input('totalQuantity') ;
        $sUserId = session('user_id') ;
  

       //! populate order details 
       $sUserName =  substr(session('user_name') , 0, 3);
       $sCurrTime = time() ;
       $sCreateOrderNo = 'CHCK' . strtoupper($sUserName) .  $sCurrTime ;
       $sorderId = time()  ;
       
    $orderData = [
     "receipt" =>  $sCreateOrderNo ,
     'amount' => (float)$sTotalAmountValue * 100.00  ,
     'currency' => 'INR' ,
     'notes' => [
         'order_id' => $sorderId ,
         'quantity' => $sTotalQuantity
     ] 
    ];

        $sGetUserFromId = UsersDetailsModel::select('user_id')->find($sUserId);
        $sUser = $sGetUserFromId['user_id'];
    
        $sFetchBillingAddress = UserProfileModel::find($sUser) ;

        $sRaz = $this->api->order->create($orderData) ;

        return view('Cart.checkoutOrderDetails' , compact('sorderId' , 'sRaz' ,'sFetchBillingAddress' )) ;
        
    }
    
    // public function makePaymentBilling(){

        
    
    // }
    
   public function successPaymentDone(Request $req){
     $sReq  = $req['response'] ;


    $sPaymentId = $sReq['razorpay_payment_id'] ;
    $sOrderId = $sReq['razorpay_order_id'] ;
    $sSignature = $sReq['razorpay_signature'] ;
    $sAmt = $sReq['amt'] ;
    $sQuant = $sReq['quant'] ;
    $sAddress = $sReq['address'] ;
    $sProducts = implode(',', $req['products'] ) ;
    

     $sCardOrderConfirmation =  CartOrderConfirmationModel::create([
        'invoice' => '00',
        'products' =>   $sProducts ,
        'address' => $sAddress ,
        'amount_paid' =>(float) $sAmt ,
        'paid' => 1 ,
        'added_by' =>  session('user_id'),
        'gateway_payment_id' => $sPaymentId ,
        'gateway_order_id' => $sOrderId ,
        'gateway_signature' => $sSignature 
        
    ]);

    if($sCardOrderConfirmation){
         //! add completed to the order

        $sOrderDetails = OrderDetailsModel::where('added_by', '=', session('user_id'))->update(['completed' => 1, 'updated_at' => now()]);

        $sStatus =  $this->api->payment->fetch($sPaymentId) ;
         if($sStatus->status == 'captured'){
            //  return redirect()->route('paymentPage')->with('success', 'Payment Sucessfull') ;
            return true ;
         }else{
            //  return redirect()->route('paymentPage')->with('failed', 'Payment Failed') ;
            return redirect()->routee('makeOrderPayment')->with('message','Payment Failed Try Again ') ;
         }
       
        
    }
 
    }
}