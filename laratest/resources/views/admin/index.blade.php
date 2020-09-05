<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee Shop Management System | Admin</title>
    <link rel="stylesheet" type="text/css" href="abc/style.css">
	<!-- BOOTSTRAP STYLES-->
    <link href="abc/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="abc/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="abc/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <link href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>



</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="abc/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                <button type="button" class="btn btn-danger">Logout</button>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="/admin" ><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                    </li>
                   <li >
                        <a href="/admin/admin_request" ><i class="fa fa-bell "></i>Customer Request <span class="badge"></span></a>
                    </li>

                    <li>
                        <a href="/admin/update"><i class="fa fa-edit "></i>Update Profile  <span class="badge"></span></a>
                    </li>
                    <li >
                        <a href="/admin/allemp"><i class="fa fa-users"></i>All Employee</a>
                    </li>
                     <li >
                        <a href="/admin/allcustomer"><i class="fa fa-users "></i>All Customer</a>
                    </li>
                    <li >
                        <a href="/admin/addadmin"><i class="fa fa-plus "></i>Add Admin  <span class="badge"></span></a>
                    </li>


                    <li>

                        <a href="/admin/addmanager"><i class="fa fa-plus "></i>Add General Manager</a>
                    </li>
                    <li>
                        <a href="/admin/adddelivery"><i class="fa fa-plus"></i>Add Delivery Man</a>
                    </li>
                   <li>
                        <a href="/admin/history"><i class="fa fa-history"></i>History</a>
                    </li>
                    
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome home </strong> 
                        </div>
                       
                    </div>
                 </div>
       <center><h1>All Iteams</h1></center>           
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount_Price</th>
                <th>status</th>
                <th>Ingredient</th>
                <th>Discount</th>
               
            </tr>
        </thead>
        <tbody>
 @foreach($food as $foods)
             
            <tr>
                <td>{{$foods->id}}</td>
                <td>{{$foods->name}}</td>
                <td>{{$foods->price}}</td>
                <td>{{$foods->discount_amount}}</td>
                <td>{{$foods->status}}</td>
                <td>{{$foods->ingredients}}</td>
                <td><center><button onclick="document.location='/admin/give/{{$foods->id}}'" type="button" class="btn btn-warning">Give</button></center></td>
 @endforeach     
                
            </tr>
           
    

        </tbody>
           </table>



    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2020 AIUB | Design by: Nafis Evan
                </div>
            </div>
        </div>
          
          <script type="text/javascript">
          	$(document).ready(function() {
    $('#example').DataTable();
} );
          </script>



     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="abc/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="abc/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="abc/js/custom.js"></script>
    
   
</body>
</html>
