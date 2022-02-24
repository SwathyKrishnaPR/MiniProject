<?php
session_start();
include "connect.php";

if(isset($_SESSION['log_id']))
{
 
$id=$_SESSION['log_id'];
$query="SELECT * FROM log_tbl where log_id ='$id'";
$res = mysqli_query($con,$query);
$r=mysqli_fetch_array($res);

if($r[4]==1)
{

  $query1="SELECT * FROM reg_tbl where log_id ='$id'";
  $res1 = mysqli_query($con,$query1);
  $r1=mysqli_fetch_array($res1);



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
  <title>User - Panel</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/userprofile3.css" rel="stylesheet">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
            include "usernav.php";
            ?>
             <!-- Topbar -->
         

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </div>

          <div class="row mb-3">
          <?php 

$id=$_SESSION['log_id'];
$query5 ="SELECT * FROM reg_tbl , log_tbl WHERE log_tbl.log_id ='$id' AND reg_tbl.log_id=log_tbl.log_id";  
$res = mysqli_query($con,$query5);
$r=mysqli_fetch_array($res);
?>
<form action="UserProfile.php" method="POST" name="frm" id="form" class="frm" >
<div class="error"><p id="demo"></p></div>
<table width="100%" border="3" style="border-collapse:collapse;">
<tr>
<th><center><strong>First Name</strong></center></th>
<td class="tdi"><center><input type="text"  class ="in" placeholder="Enter The First Name" name="name" id="name"autocomplete="off" value="<?php echo $r['name'];?>"></center></td>
</tr>
<tr>
<th><center><strong> Last Name</strong></center></th>
<td class="tdi"><center><input type="text"  class ="in" placeholder="Enter The Last Name" name="lname" id="lname"autocomplete="off" value="<?php echo $r['lname'];?>"></center></td>
</tr>
<th><center><strong>Address</strong></center></th>
<td class="tdi"><center><input type="text" class ="in" id="address" name="address" autocomplete="off" value="<?php echo $r['address'];?>"></center></td>
</tr> 
<tr>
<th><center><strong>Email</strong></center></th>
<td class="tdi"><center><input type="text" class ="in" placeholder="Enter The Email Id" id="email" name="email" autocomplete="off" value="<?php echo $r['email'];?>"></center></td>
</tr>
<tr>
<th><center><strong>Phone Number</strong></center></th>
<td class="tdi"><center><input type="text" class ="in"placeholder="Enter The Phone Number"id ="mphone" name="mphone"autocomplete="off" value="<?php echo $r['mphone'];?>"></center></td>
</tr>
<tr>
<th><center><strong>Username</strong></center></th>
<td class="tdi"><center><input type="text" class ="in" placeholder="Enter Your User Name" id="uname" name="uname"autocomplete="off" value="<?php echo $r['uname'];?>"></center></td>
</tr>   
</table>
<a href="EditProfileUser.php" class="button1">Edit Profile</a>
<a href="UserProfile.php" class="button2">Cancel</a>

</form>
   </table>

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
}
else{
  echo '<script type="text/javascript">window.location.href="block.php"</script>';
}
}
            else
            {
                if(headers_sent())
                    {
                         die('<script type="text/javascript">window.location.href="log.php"</script>');
                     }
            else
            {
            header("location:log.php");
            die();
            }
        }
            

?>