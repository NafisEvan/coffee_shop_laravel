<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee Shop Management System | AddAdmin</title>
    <link rel="stylesheet" type="text/css" href="abc/style.css">
    <!-- BOOTSTRAP STYLES-->
    <link href="/abc/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="/abc/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="/abc/css/custom.css" rel="stylesheet" />
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
                        <img src="/abc/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                 <button type="button" onclick="document.location='/logout'" class="btn btn-danger">Logout</button>


                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li  >
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
                    <li>
                        <a href="/admin/addadmin"><i class="fa fa-plus "></i>Add Admin  <span class="badge"></span></a>
                    </li>


                    <li>

                        <a href="/admin/addmanager"><i class="fa fa-plus "></i>Add General Manager</a>
                    </li>
                    <li>
                        <a href="/admin/adddelivery"><i class="fa fa-plus"></i>Add Delivery Man</a>
                    </li>
                     <li>
                        <a href="/admin/viewprofile"><i class="fa fa-eye"></i>View profile</a>
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
                     <h2>ADMIN </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            <center><h1>Give Discount</h1></center>  

       <form method="post">
         <div class="form-group row">
           @foreach($dis as $food)
    <label for="inputText3" class="col-sm-2 col-form-label" >Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" readonly="" value="{{$food->id}}  ">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputText3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="uname" readonly="" value="{{ $food->name}} ">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputText3" class="col-sm-2 col-form-label" >Price</label>
    <div class="col-sm-10">
      <input type="price" class="form-control" name="password" readonly=""  value="{{ $food->price }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Discount_Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email"readonly=""value="{{$food->discount_amount}}  ">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputNumber3" class="col-sm-2 col-form-label">status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="phone"readonly="" value="{{$food->status}} ">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Ingredient</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address" readonly=""  value="{{ $food->ingredients}} ">
    </div>
  </div>
   

   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="discount"  value="{{$food->discount}}  ">
    </div>
  </div>
  @endforeach
 

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <center><button type="submit" class="btn btn-primary">Give</button></center>
    </div>
  </div>
</form>


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
    <script src="/abc/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="/abc/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="/abc/js/custom.js"></script>
    
   
</body>
</html>
