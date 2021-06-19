<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\login;
use App\Customer;
use Validator;
class LoginController extends Controller
{
    public function index(){
      return view('login.index');
    }
    
    public function verify(Request $req){

        switch ($req->input('action')) {
        case 'Signup':
        /*$req->validate([
            'userName'=>'bail|required|unique:userName',
            'password'=>'required',
            'phone'=>'required|unique:phone',
            'email'=>'required|email',
            'NID'=>'required'
        ]);
*/
        $user = new Customer();
        $userlogin = new login();
        if($req->passwordSignup == $req->confirmPassword){
        if($req->phone == $req->confirmPhone){
        $user->userName = $req->userNameSignup;
        $userlogin->userName = $req->userNameSignup;
        $userlogin->password = $req->passwordSignup;
        $userlogin->status = 3;
        $user->firstName = $req->firstName;
        $user->lastName = $req->lastName;
        $user->email= $req->email;
        $user->NID = $req->NID;
        $user->phone = $req->phone;
        $userlogin->phone = $req->phone;
        $user->address = $req->address;
        $user->DOB = $req->DOB;
        $user->available = 0;
        if($user->save()){
            $userlogin->save();
            $req->session()->put('userName', $req->userName);

            return back()->with('info','Success!! please log in...');
        }else{
            return redirect('/login');
        }
        }}
            break;

        case 'Login':

           $user = login::where('userName', $req->userName)
                    ->where('password', $req->password)
                    ->first();      
            if($user != null){
                $status = $user->status;
                if($status == "1"){  
              $req->session()->put('userName', $req->userName);
              return redirect('/admin');
              }
              else if($status == "3"){
                $req->session()->put('userName', $req->userName);
              return redirect('/admin');
              }
              else{
              $req->session()->flash('msg', 'invalid username/password');
              return redirect('/home');
                }
              }
            else{
              $req->session()->flash('msg', 'invalid username/password');
              return redirect('/login');
                }
            break;
    }
    }
}
