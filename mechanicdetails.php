<?php
session_start();
include "connect.php";

if (isset($_SESSION['log_id'])) {

  $id = $_SESSION['log_id'];
  $query = "SELECT * FROM log_tbl where log_id ='$id'";
  $res = mysqli_query($con, $query);
  $r = mysqli_fetch_array($res);




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
    <link href="css/userdetails.css" rel="stylesheet">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
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
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Mechanic Details</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="adminpanel.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">mechanic Details</li>
                </ol>
              </div>

              <div class="row mb-3">


                <table width="100%" border="3" style="border-collapse:collapse;">
                  <thead>
                    <tr>
                      <th>
                        <center><strong>Mec_id</strong></center>
                      </th>
                      <th>
                        <center><strong>First Name</strong></center>
                      </th>
                      <th>
                        <center><strong>Last Name</strong></center>
                      </th>
                      <th>
                        <center><strong>Address</strong></center>
                      </th>
                      <th>
                        <center><strong>Email</strong></center>
                      </th>
                      <th>
                        <center><strong>Phone</strong></center>
                      </th>
                      <th>
                        <center><strong>Status</strong></center>
                      </th>
                      <th>
                        <center><strong>Action</strong></center>
                      </th>
                      <th>
                        <center><strong>Activate</strong></center>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    $sel_query = "select log_tbl.*,mec_tbl.* from log_tbl,mec_tbl where log_tbl.log_id=mec_tbl.log_id";
                    $result = mysqli_query($con, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td>
                          <center><?php echo $row["mec_id"]; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["mname"]; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["mlname"]; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["address"]; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["email"]; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["phone"]; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["status"]; ?></center>
                        </td>
                        <td>
                          <center>
                            <a href="mechanicblock.php?id=<?php echo $row["log_id"]; ?>">Delete</a>
                          </center>
                        </td>
                        <td>
                          <center>
                            <a href="mechanicunblock.php?id=<?php echo $row["log_id"]; ?>">Unblock</a>
                          </center>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>


                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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

} else {
  if (headers_sent()) {
    die('<script type="text/javascript">window.location.href="log.php?e=1"</script>');
  } else {
    header("location:log.php?e=1");
    die();
  }
}


?>