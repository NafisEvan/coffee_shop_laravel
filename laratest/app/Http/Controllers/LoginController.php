<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;

class LoginController extends Controller
{
    
    public function index(Request $req){
    	return view('login.index');
    }

    public function verify(Request $req){
 

       $validation = Validator::make($req->all(), [
            'uname'=>'bail|required|exists:users,username',
            'password'=>'required|exists:users,password'
            
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('/login')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

            else {
                 $user = DB::table('users')
                    ->where('username', $req->uname)
                    ->where('password', $req->password)
                    ->first();
         if ( $user) {

         if($user->userType=='admin'){
                   $req->session()->put('uname', $req->uname);
                   return redirect()->route('admin.index');
               }
              
               else{
                   
                   return redirect()->route('login.index');
               }
         }
         else
         {
           $req->session()->flash('msg', 'Please,cheack Your username and password again');
           return redirect()->route('login.index');
         }
              

          // }
            

             }

              }

                
            
          



}