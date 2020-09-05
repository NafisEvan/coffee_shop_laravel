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

//allcustomer

function addmanager(){

        
        return view('admin.addmanager');   
    }

//add deliveryman
function adddelivery(){

        
        return view('admin.adddelivery');   
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






    function edit($id){

    	$users = $this->getStudentList();

    	//find one student by ID from array

    	$user = ['id'=>'2', 'name'=>'abc','email'=>'abc@aiub.com', 'password'=>'456'];
    	return view('home.edit')->with('user', $user);

    }

  

    function delete($id){

    	$users = $this->getStudentList();
    	//show comfirm view

    	return view('home.delete')->with('user', $user);

    }

    function destroy($id, Request $request){
    	
    	$users = $this->getStudentList();
    	//find student by id & delete
    	//updated list

    	return view('home.index')->with('users', $users);
    }


    function getStudentList(){
    	return  [
	    			['id'=>'1', 'name'=>'alamin','email'=>'abc@gmail.com', 'password'=>'123'],
	    			['id'=>'2', 'name'=>'abc','email'=>'abc@aiub.com', 'password'=>'456'],
	    			['id'=>'3', 'name'=>'xyz','email'=>'xyz@gmail.com', 'password'=>'789']
				];
    }
}
