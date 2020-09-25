<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\User;

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

function update(Request $req){

   $name=$req->session()->get('uname');
        $update = DB::table('users')
                   ->where('username',$name)
                   ->get();
                    
        return view('admin.update')
                  ->with('update',$update);
    }

   //view profile
   function viewprofile(Request $req){

   $name=$req->session()->get('uname');
        $update = DB::table('users')
                   ->where('username',$name)
                   ->get();
                    
        return view('admin.viewprofile')
                  ->with('update',$update);
    } 


  public function update_save(Request $req){

        $validation = Validator::make($req->all(), [
            'name'            => 'required',
            'password'        => 'required',
            'email'           => 'required',
          // 'email'           => 'required|unique:users|email',
            'email'           => 'required|email',
            'phone'           => 'bail|required|size:11',
            'address'         => 'required',


        ]);

       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.update')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {
             	 $name=$req->session()->get('uname');
               DB::table('users')
                       ->where('username',$name)
                      ->update(
             ['name' =>$req->name ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address]
            );
                      $update = DB::table('users')
                   ->where('username',$name)
                   ->get();
          $req->session()->flash('msgup', 'Profile has been updated Successfully');
           return view('admin.update')
                  ->with('update',$update);


           }

       }



//allemp

   function allemp(Request $req){

            $emp = DB::table('users')->get();
//->where('userType','employee')


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
                

                 $validation = Validator::make($req->all(), [
            'name'            => 'required',
            'password'        => 'required',
            'email'           => 'required',
             //'email'           => 'required|unique:users|email',
            'phone'           => 'bail|required|size:11',
            'address'         => 'required',
            'salary'         => 'required',


        ]);

       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.updateuser')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {
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
              	 if($req->hasFile('pic')){
                    $file = $req->file('pic');
                    $image=date('mdYHis') . uniqid() .$file->getClientOriginalName();
                     if($file->move('image',$image)){

             
               DB::table('users')->insert(
             ['name' =>$req->name ,'username'=>$req->username ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'gender'=>$req->gender , 'salary'=>$req->salary,'image'=>$image,'userType'=>'admin' ]
            );
          $req->session()->flash('msg', 'Admin Has been Added Successfully');
           return view('admin.addadmin');
                      }
                     else{
                               return redirect()->route('admin.addadmin ');
                         }

                         }
                         else{
                               echo "File not found!";
                            }


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
             //'Image'          => 'required',
        ]);

       if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

            return redirect()->route('admin.addmanager')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {

                  if($req->hasFile('pic')){
                    $file = $req->file('pic');
                    $image=date('mdYHis') . uniqid() .$file->getClientOriginalName();
                     if($file->move('image',$image)){

               DB::table('users')->insert(
             ['name' =>$req->name ,'username'=>$req->username ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'gender'=>$req->gender , 'salary'=>$req->salary,'image'=>$image,'userType'=>'manager' ]
            );
          $req->session()->flash('msg', 'Manager Has been Added Successfully');
           return view('admin.addmanager');
                        }
                     else{
                               return redirect()->route('admin.adddmanager ');
                         }

                         }
                         else{
                               echo "File not found!";
                            }


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

            return redirect()->route('admin.adddelivery')
                            ->with('errors', $validation->errors())
                            ->withInput();
            }

              else
             {

                  if($req->hasFile('pic')){
                    $file = $req->file('pic');
                    $image=date('mdYHis') . uniqid() .$file->getClientOriginalName();
                     if($file->move('image',$image)){

                     	 DB::table('users')->insert(
             ['name' =>$req->name ,'username'=>$req->username ,'password'=>$req->password , 'email'=>$req->email , 'phone'=>$req->phone ,'address'=>$req->address , 'gender'=>$req->gender , 'salary'=>$req->salary,'image'=>$image,'userType'=>'delivery_m' ]
            );
          $req->session()->flash('msg', 'deliveryman Has been Added Successfully');
           return view('admin.adddelivery');
                     }
                     else{
                               return redirect()->route('admin.adddelivery ');
                         }

                         }
                         else{
                               echo "File not found!";
                            }


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

//pdf
        public function export1( $id)
           {
               $data = DB::table('users')->where('id',$id)->orderBy('id','DESC')->first();
               $proData="";
               if(count((array)$data)>0){
                   $proData .='<table align="center">
                   ';

                   foreach ($data as $key=>$item) {
                        $proData .='
                        <tr>
                        <td>'.$key.'</td>
                        <td align="center">'.$item.'</td>
                        </tr>';
                   }
                   $proData .='</table>';
               }
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename=emp_info.xls');
               echo $proData;
               //var_dump($data);
               //echo count($data);
               //return response()->json($data);
           }

           //food excl

         public function export( $id)
           {
               $data = DB::table('food')->where('id',$id)->orderBy('id','DESC')->first();
               $proData="";
               if(count((array)$data)>0){
                   $proData .='<table align="center">
                   ';

                   foreach ($data as $key=>$item) {
                        $proData .='
                        <tr>
                        <td>'.$key.'</td>
                        <td align="center">'.$item.'</td>
                        </tr>';
                   }
                   $proData .='</table>';
               }
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename=Food details.xls');
               echo $proData;
               //var_dump($data);
               //echo count($data);
               //return response()->json($data);
           }
               

               function history(){


        return view('admin.history');
      }


          //delman excl

         public function downloadman()
           {
               $data1 = DB::table('users')
                        ->where('userType','manager')
                        ->select(DB::raw("SUM(salary)"))
                        ->get();
              $data = DB::table('users')
                           ->where('userType','manager')
                           ->pluck('salary','username');
               $proData="";
               if(count((array)$data)>0){
                   $proData .='<table align="center">
                   ';

                   foreach ($data as $key=>$item) {
                        $proData .='
                        <tr>
                        <td>'.$key.'</td>
                        <td align="center">'.$item.'</td>
                        </tr>';
                   }
                   $proData .='</table>';
               }
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename= All Managers Salary.xls');
               echo $proData;
               echo $data1;
               //var_dump($data);
               //echo count($data);
               //return response()->json($data);
           }
           //delman excl

         public function downloademp()
           {
               $data1 = DB::table('users')
                        ->where('userType','admin')
                        ->select(DB::raw("SUM(salary)"))
                        ->get();
              $data = DB::table('users')
                           ->where('userType','admin')
                           ->pluck('salary','username');
               $proData="";
               if(count((array)$data)>0){
                   $proData .='<table align="center">
                   ';

                   foreach ($data as $key=>$item) {
                        $proData .='
                        <tr>
                        <td>'.$key.'</td>
                        <td align="center">'.$item.'</td>
                        </tr>';
                   }
                   $proData .='</table>';
               }
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename=All Admins Salary.xls');
               echo $proData;
               echo $data1;
               //var_dump($data);
               //echo count($data);
               //return response()->json($data);
           }
           //delman excl

         public function downloaddel()
           {
               $data1 = DB::table('users')
                        ->where('userType','delivery_m')
                        ->select(DB::raw("SUM(salary)"))
                        ->get();
              $data = DB::table('users')
                           ->where('userType','delivery_m')
                           ->pluck('salary','username');
               $proData="";
               if(count((array)$data)>0){
                   $proData .='<table align="center">
                   ';

                   foreach ($data as $key=>$item) {
                        $proData .='
                        <tr>
                        <td>'.$key.'</td>
                        <td align="center">'.$item.'</td>
                        </tr>';
                   }
                   $proData .='</table>';
               }
               header('Content-Type: application/xls');
               header('Content-Disposition: attachment; filename=All deliverymans Salary.xls');
               echo $proData;
               echo $data1;
               //var_dump($data);
               //echo count($data);
               //return response()->json($data);
           }
}
