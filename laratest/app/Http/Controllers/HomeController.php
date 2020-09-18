<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class HomeController extends Controller
{
   

//index    
    function index(Request $req){

    	$food = DB::table('food')
                       ->orderby('id','desc')
                       ->get();

		return view('admin.index')
                    ->with('food',$food);
    }



//request
function request(Request $req){

        $req = DB::table('customer')
                       ->where('status',0)
                       ->get();

        return view('admin.request')
                  ->with('req',$req);
    }





 //update

function update(){

        
        return view('admin.update');
    }

   
  public function update_save(Request $req){
          
        $validation = Validator::make($req->all(), [
            'name'            => 'required', 
            'password'        => 'required', 
            'email'           => 'required|unique:users|email', 
            'phone'           => 'bail|required|size:11', 
            'address'         => 'required', 
            
                   
        ]);
            
       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.addadmin')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {
               DB::table('users')->update(
             ['name' =>$req->name ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'image'=>$req->salary,'userType'=>'admin' ]
            );
          $req->session()->flash('msg', 'Admin Has been Added Successfully');
           return view('admin.update');   


           }
       }



//allemp

function allemp(Request $req){

         $emp = DB::table('users')
                       ->where('userType','employee')
                       ->get();
        
        return view('admin.allemp')
                     ->with('emp', $emp );
    }


//allcustomer

function allcustomer(Request $req){ 
      $allcustomer = DB::table('customer')
                       ->where('status',1)
                       ->get();


        
        return view('admin.allcustomer')
                    ->with('allcustomer', $allcustomer );
    }


//addadmin

function addadmin(){

        
        return view('admin.addadmin');   
    }

public function addadmin_save(Request $req){
          
        $validation = Validator::make($req->all(), [
            'name'            => 'required', 
            'username'        => 'required|unique:users', 
            'password'        => 'required', 
            'email'           => 'required|unique:users|email', 
            'phone'           => 'bail|required|size:11', 
            'address'         => 'required', 
            'gender'          => 'required', 
            'salary'          => 'required', 
                   
        ]);
            
       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.addadmin')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {
               DB::table('users')->insert(
             ['name' =>$req->name ,'username'=>$req->username ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'gender'=>$req->gender , 'salary'=>$req->salary,'image'=>$req->salary,'userType'=>'admin' ]
            );
          $req->session()->flash('msg', 'Admin Has been Added Successfully');
           return view('admin.addadmin');   


           }
       }


//add manager

function addmanager(){

        
        return view('admin.addmanager');   

    }

    public function addmanager_save(Request $req){
          
        $validation = Validator::make($req->all(), [
            'name'            => 'required', 
            'username'        => 'required|unique:users', 
            'password'        => 'required', 
            'email'           => 'required|unique:users|email', 
            'phone'           => 'bail|required|size:11', 
            'address'         => 'required', 
            'gender'          => 'required', 
            'salary'          => 'required', 
                   
        ]);
            
       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.addadmin')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {
               DB::table('users')->insert(
             ['name' =>$req->name ,'username'=>$req->username ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'gender'=>$req->gender , 'salary'=>$req->salary,'image'=>$req->salary,'userType'=>'manager' ]
            );
          $req->session()->flash('msg', 'Manager Has been Added Successfully');
           return view('admin.addmanager');   


          
           }
       }

//add deliveryman
function adddelivery(){

        
        return view('admin.adddelivery');   
    }


    public function adddelivery_save(Request $req){
          
        $validation = Validator::make($req->all(), [
            'name'            => 'required', 
            'username'        => 'required|unique:users', 
            'password'        => 'required', 
            'email'           => 'required|unique:users|email', 
            'phone'           => 'bail|required|size:11', 
            'address'         => 'required', 
            'gender'          => 'required', 
            'salary'          => 'required', 
                   
        ]);
            
       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.addadmin')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {
               DB::table('users')->insert(
             ['name' =>$req->name ,'username'=>$req->username ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'gender'=>$req->gender , 'salary'=>$req->salary,'image'=>$req->salary,'userType'=>'delivery_m' ]
            );
          $req->session()->flash('msg', 'deliveryman Has been Added Successfully');
           return view('admin.addmanager');   


          
           }
       }

//discount
function discount(){

        
        return view('admin.discount');   
    }

//updateuser
function updateuser(){

        
        return view('admin.updateuser');      

    }


//ingredient
function ingredient(){

        
        return view('admin.ingredient');       

    }




}
