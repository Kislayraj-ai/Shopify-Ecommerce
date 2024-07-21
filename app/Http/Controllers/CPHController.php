<?php

namespace App\Http\Controllers;

use App\Models\CphUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CPHController extends Controller
{

    public function cphLoginUser(){
       
        return view('CPH.cph_login') ;
    }
    
    public function cphUserAuthentication(Request $req){

        $sData = $req->all();

        $userName = $req->input('usernameCph') ;
        $pass = $req->input('passwordCph') ;

        $sVerified = false; 
        $user =  CphUserModel::all() ;

            // Decrypting Data
        foreach($user as $user){
            
         if($user->username == $userName  &&  $user->password == md5($pass)){
            $sVerified = true ;
           
           
            session(['user_id' => $user->id, 'user_name' => $user->username]);
          
            
              return redirect()->route('cph_dashboard') ;
         }
        }

        if(!$sVerified){
            echo "somethign went wrong " ;
            return false;
        }
        
        return view('CPH.cph_login') ;
    }

    public function cphDashboard(){
       
        return view('CPH.cph_dashboard') ;
    }


    public function cphUserLogout(){

        // ession()->forget(['key1', 'key2']);
        session()->flush();
        return  redirect()->route('cphLogin');
      
    }
}