<?php
session_start();
include "connect.php";

if(isset($_SESSION['log_id']))
{
 
$id=$_SESSION['log_id'];
$query="SELECT * FROM log_tbl where log_id ='$id'";
$res = mysqli_query($con,$query);
$r=mysqli_fetch_array($res);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="Images1/applogo.png" rel="icon">
  <title>Admin - Panel</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/mecstyles.css" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/mecreg2.js"> </script>
  
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminpanel.php">
        <div class="sidebar-brand-icon">
          <img src="Images1/applogo.png">
        </div>
        <div class="sidebar-brand-text mx-3">AUTORS</div>
      </a>
       <!-- Sidebar -->
       <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <!-- TopBar -->
            <?php
            include "nav.php";
            ?>
            <!-- Topbar -->
        

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Mechanic Registration</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Registration</li>
            </ol>
          </div>
 <form action="mechanicreg.php" method="POST" name="frm" id="form" >
<div class="error"><p id="demo"></p></div>
<table >
<tr>
<td><label> Name </label></td>
<td class="tdi"><input type="text" placeholder="Enter The First Name" name="mname" id="mname"autocomplete="off">
<div class="error" id="demo0"></div></td>
</tr>
<tr>
<td><label> Last Name </label></td>
<td class="tdi"><input type="text" placeholder="Enter The Last Name" name="mlname" id="mlname"autocomplete="off">
<div class="error" id="demo1"></div></td>
</tr>
<td><label>Address </label></td>
<td class="tdi"><textarea rows="5"cols="20" placeholder="Enter Address" id="address" name="address" autocomplete="off"></textarea>
<div class="error" id="demo2"></div></td>
</tr> 
<tr>
<td><label>Email </label></td>
<td class="tdi"><input type="text"placeholder="Enter  Email Id" id="email" name="email" autocomplete="off">
<div class="error" id="demo3"></div></td>
</tr>
<tr>
<td><label>Phone no  </label></td>
<td class="tdi"><input type="text"placeholder="Enter Phone Number"id ="phone" name="phone"autocomplete="off">
<div class="error" id="demo4"></div></td>
</tr>
<tr>
<td><label>User Name </label></td>
<td class="tdi"><input type="text"placeholder="Enter  User Name" id="uname" name="uname"autocomplete="off">
<div class="error" id="demo5"></div></td>
</tr>
<tr>
<td><label>Password </label></td>
<td class="tdi"><input  name="pass" type="password" id="pass" placeholder="Enter  Password"autocomplete="off" />
<div class="error" id="demo6"></div></td>
</tr>
<br>

<tr>
  <td><input type ="hidden" name="usertype" value="mechanic"></td>
    </tr>
    
</table>

<input type="submit" name="Click" class="sub" value="Register"/>
</form>


          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
     </div>
     
    </div>
  </div>
   
  

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>
<?php
if(isset($_POST["Click"]))
{
$mname=$_POST["mname"];
$mlname=$_POST["mlname"];
$address=$_POST["address"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$uname=$_POST["uname"];
$pass=$_POST["pass"];
$usertype=$_POST["usertype"];
$sql2="select * from log_tbl where uname='$uname' ";
$result=mysqli_query($con,$sql2);
$count=mysqli_num_rows($result);

if($count>0)
{
  
    ?>
    <script>
    alert("Sorry! Username Already in use");
    </script>
    <?php
  }
  else
  {
    $sql1="insert into log_tbl(uname,pass,usertype,status)values('$uname','$pass','$usertype',1)";

if(mysqli_query($con,$sql1))
{
  $last_id = mysqli_insert_id($con);
  $sql="insert into mec_tbl(log_id,mname,mlname,address,email,phone)values('$last_id','$mname','$mlname','$address','$email','$phone')";  
if(mysqli_query($con,$sql))
{ 
  if(headers_sent())
  {
    ?>
    <script>
      alert("Mechanic Registered Successfully");
      </script>
      <?php
  die('<script type="text/javascript">window.location.href="adminpanel.php"</script>');
  }
  else{
  header("location:adminpanel.php");
  die();
  }
   
}
}
else{
?>

<script>
alert("error");
</script>
<?php
}
}
}
mysqli_close($con);			
?>
<?php 

}
            else
            {
                if(headers_sent())
                    {
                         die('<script type="text/javascript">window.location.href="log.php?e=1"</script>');
                     }
            else
            {
            header("location:log.php?e=1");
            die();
            }
        }
            

?>
