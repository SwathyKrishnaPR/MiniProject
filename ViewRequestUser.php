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
                <h1 class="h3 mb-0 text-gray-800">New Request</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="adminpanel.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">New Request</li>
                </ol>
              </div>

              <div class="row mb-3">

                <table width="100%" border="3" style="border-collapse:collapse;">
                  <thead>
                    <tr>
                    <th>
                        <center><strong>Request Id</strong></center>
                      </th>
                      <th>
                        <center><strong>Name</strong></center>
                      </th>

                      <th>
                        <center><strong>Phone</strong></center>
                      </th>
                      <th>
                        <center><strong>Vehicle Model</strong></center>
                      </th>
                      <th>
                        <center><strong>Problem</strong></center>
                      </th>
                      <th>
                        <center><strong>Date</strong></center>
                      </th>
                      <th>
                        <center><strong>Location</strong></center>
                      </th>
                      <th>
                        <center><strong>Status</strong></center>
                      </th>
                      <th>
                        <center><strong>Action</strong></center>
                      </th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;

                    $sel_query = "SELECT * FROM reg_tbl,request_tbl WHERE reg_tbl.log_id=request_tbl.log_id AND request_tbl.status='Requested'";
                    $result = mysqli_query($con, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <form method="POST" action="assignmech.php">
                        <tr>

                          <input type="text" name="req" value="<?php echo $row["req_id"]; ?>" hidden />


                          <input type="text" name="log" value="<?php echo $row["log_id"]; ?>" hidden />

                          <td>
                            <center><?php echo $row["req_id"]; ?></center>
                          </td>
                          <td>
                            <center><?php echo $row["name"] . $row["lname"]; ?></center>
                          </td>

                          <td>
                            <center><?php echo $row["mphone"]; ?></center>
                          </td>
                          <td>
                            <center><?php echo $row["category"]; ?></center>
                          </td>
                          <td>
                            <center><?php echo $row["problem"]; ?></center>
                          </td>
                          <td>
                            <center><?php echo $row["date"]; ?></center>
                          </td>

                          <td>
                            <center><?php echo $row["location"]; ?></center>
                          </td>
                          <td>
                            <center><?php echo $row["status"]; ?></center>
                          </td>
                          <td align="center">
                            
                            <center><button type="submit" name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                                  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
                                </svg></button></center>
                          </td>
                         
                          
                        </tr>
                      <?php
                    }
                      ?>
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