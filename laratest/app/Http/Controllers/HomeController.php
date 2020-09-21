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


//accept

   public function accept($id){  

        $accept = DB::table('customer')
                   ->where('id',$id)
                    ->update( ['status' =>'1' ]);
                       
        return redirect()->route('admin.request'); 
    }

//reject

   public function reject($id){  

        $reject = DB::table('customer')
                   ->where('id',$id)
                    ->update( ['status' =>'2' ]);
                       
        return redirect()->route('admin.request'); 
    }

//block

   public function block($id){  

        $reject = DB::table('customer')
                   ->where('id',$id)
                    ->update( ['status' =>'4' ]);
                       
        return redirect()->route('admin.allcustomer'); 
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

//Update Employee

function updateEmp($id){

         $emp = DB::table('users')
                       ->where('id',$id)
                       ->get();
        
        return view('admin.updateuser')
                     ->with('emp', $emp );
    }


//Update Employee Post

function updateEmp_post(Request $req,$id){


                  $update = DB::table('users')
                            ->where('id',$id)
                            ->update( ['name' =>$req->name,'password' =>$req->password,'phone' =>$req->phone, 'address' =>$req->address, 'salary' =>$req->salary ]);

                   $emp = DB::table('users')
                       ->where('id',$id)
                       ->get();
        $req->session()->flash('upmsg', 'Update Has been done Successfully');

      return view('admin.updateuser')
                     ->with('emp', $emp );
 

    }




//delete

   public function delete($id){  

        $reject = DB::table('users')
                   ->where('id',$id)
                    ->delete();
                       
        return redirect()->route('admin.allemp'); 
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
public function give($id){

             $dis = DB::table('food')
                       ->where('id',$id)
                       ->get();
        
        return view('admin.give')
                     ->with('dis', $dis );  
    }

public function give_post(Request $req,$id){

            $update = DB::table('food')
                            ->where('id',$id)
                            ->update( ['discount_amount' =>$req->discount ]);

                    $dis = DB::table('food')
                       ->where('id',$id)
                       ->get();
        $req->session()->flash('dismsg', 'Discount Has been Given Successfully');  
        return view('admin.give')
                     ->with('dis', $dis );  
        
    }


//ingredient
function ingredient(){

        
        return view('admin.ingredient');       

    }




}
