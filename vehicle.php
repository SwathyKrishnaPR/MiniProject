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
  <link href="css/vehicle.css" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/vmodel.js"> </script>
  
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
            <h1 class="h3 mb-0 text-gray-800">Add Vehicle Model</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="adminpanel.php/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Vechicle Model</li>
            </ol>
          </div>
 <form action="vehicle.php" method="POST" name="frm" id="form" >
<div class="error"><p id="demo"></p></div>
<table >
<tr>
<td><label> Vehicle Model</label></td>
<td class="tdi"><select type="vmodel" name="vmodel" id="model">
                    <option selected disabled value="">Select Vehicle Type</option>
                    <?php
                    $sel_query =  mysqli_query($con, "select *from vmodel_tbl");
                    while ($r5 =  mysqli_fetch_array($sel_query)) {
                    ?>
                      <option value="<?php echo $r5['vm_id']; ?>"><?php echo $r5['vmodel']; ?></option>
                    <?php

                    }
                    ?>
                  </select>
                </td>
</tr>
<td><label> Vehicle</label></td>
<td class="tdi"><input type="text" placeholder="Enter Model Name" name="vehicle" id="vehicle" autocomplete="off">
<div class="error" id="demo0"></div></td>
</tr>

    
</table>
<input type="text" name="vm" value='<?php echo $vm; ?>' hidden />
<input type="submit" name="Click" class="sub" value="ADD"/>
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
$vm=$_POST['vm'];
$vmodel=$_POST['vmodel'];
$vehicle=$_POST['vehicle'];
$sql2="select * from vehicle where vehicle='$vehicle' ";
$result=mysqli_query($con,$sql2);
$vcount=mysqli_num_rows($result);

if($vcount>0)
{
  
    ?>
    <script>
    alert("Vehicle Model Already Added");
    </script>
    <?php
  }
  else
  {
    $sql3="select * from vehicle where vehicle='$vehicle' ";
$result3=mysqli_query($con,$sql2);
$f=mysqli_fetch_array($result);
    $sql="insert into vehicle(vm_id,vmodel,vehicle)values('$f[vm_id]','$vmodel','$vehicle')";
if(mysqli_query($con,$sql))
{ 
  if(headers_sent())
  {
    
    ?>
    <script>
      alert("Vehicle Model Successfully");
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
