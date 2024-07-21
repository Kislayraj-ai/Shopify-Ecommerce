<?php

namespace App\Http\Controllers;

use App\Models\UserProfileModel;
use App\Models\UsersDetailsModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Event\Runtime\PHP;

class UsersDetailsController extends Controller
{

    public function openLoginPage(){
        return view('userlogin');
    }
    public function loginUerWithAuthentication(Request $req){

        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $userName = $req->input('username');
        $pass = $req->input('password');
        // $credentials = $req->only('username', 'password');
        $sVerified = false; 
        $user = UsersDetailsModel::all() ;

        
        foreach($user as $user){
        
     
       
         if($user->user_name == $userName  &&  $user->user_password == $pass){
            $sVerified = true ;
           
           
            session(['user_id' => $user->id, 'user_name' => $user->user_name]);
          
            // '
              return redirect('HomePage');
         }
        }
            
        $Msg = "Incorrect Username or Password" ;
        if(!$sVerified){
             return redirect()->route('openLoginPage') ;
        
        }
    }   

    public function openHomePage(){
        return view('home') ;
    }

    public function logoutUer(){
        // session()->forget('user_id');
        // session()->forget('user_name');
        
        session()->flush();
        return redirect()->route('openLoginPage') ;
    }


    public function newUserRegistration(Request $req){
        $sData = $req->all();

        $sFirstName = $req->input('userFnameRegister') ;
        $sLastName = $req->input('userlnameRegister') ;
        $sEmail = $req->input('emailRegister') ;
        $sPhoneRegister = $req->input('phoneRegister') ;

        $sArea = $req->input('areaRegister') ;
        $sCity = $req->input('cityRegister') ;
        $sState = $req->input('stateRegister') ;
        $sZip = $req->input('zipRegister') ;
        
        $sPass = $req->input('passRegister') ;
        $dob = $req->input('dobRegister') ;

        //! user profile insertation
       $sProfile = UserProfileModel::create([
        'fname' => $sFirstName  ,
        'lname' => $sLastName  ,
        'email' =>  $sEmail  ,
        'phoneno' =>  $sPhoneRegister ,
        'area' =>   $sArea ,
        'city' =>   $sCity ,
        'state' =>   $sState ,
        'zip_code' =>   $sZip ,
        'dob'   => $dob 
       ]) ;


       if( $sProfile){

        //! Create user name
        $sUserName = $sFirstName .$sLastName ;
        $sUserName = strtolower($sUserName) ;
        $slastInsertedCard  = $sProfile->user_id ;

        $detail = UsersDetailsModel::create([
            "user_id" => $slastInsertedCard ,
            "user_name" => $sUserName  ,
            "user_password" =>  $sPass ,
            'freeze' =>  0
        ]) ;
        


        //! send confirmation sMail to user
        $sMail =  new PHPMailer(true) ;

        try {
           
            $sMail->isSMTP();
            $sMail->Host = "smtp.gmail.com";
            $sMail->SMTPAuth = true;
            $sMail->Username = "kislayraj69@gmail.com";
            $sMail->Password = "xaff cpba xxye objl";
            // $sMail->SMTPSecure = 'ssl';
         
            $sMail->SMTPSecure =  "tls";
            $sMail->Port = 587;
            // $sMail->Port = 465;
           
            $sMail->setFrom('kislayraj69@gmail.com'); 
            $sMail->addAddress($sEmail);
         
            $sMail->isHTML(true);
           
            $sMail->Subject = "Shofiy Account Verification" ;
            $sMail->Body = "Hi {$sFirstName} ,
            You have successfully registerd on Shopify . Please Login With Your username  and password \n 
            username :- {$sUserName} " ;
            $sMail->send() ;
              
                  
           
                
        } catch (Exception $e) {
            echo $e->getMessage() ; die;
        }
        
        if($detail){
            return redirect()->route('openLoginPage') ;
        }
     

       }


    }


    public function openManageUser(){
       return view('CPH.manageUser') ;
    }

    public function getAllUsersListForAdmin(){
        $sData = UserProfileModel::all() ;
        return  $sData ;
    }

    public function getSingleUserById(Request $req){
        $sUserId = $req->input('userId') ;
        $sUser = UsersDetailsModel::find($sUserId) ;
        $sGetusers = UserProfileModel::find( $sUser->user_id) ;
        return  $sGetusers ;


    }
}