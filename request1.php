<?php
session_start();
include "connect.php";

if (isset($_SESSION['log_id'])) {

  $id = $_SESSION['log_id'];
  $query = "SELECT * FROM log_tbl where log_id ='$id'";
  $res = mysqli_query($con, $query);
  $r = mysqli_fetch_array($res);

  if ($r[4] == 1) {

    $query1 = "SELECT * FROM reg_tbl where log_id ='$id'";
    $res1 = mysqli_query($con, $query1);
    $r1 = mysqli_fetch_array($res1);



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
      <link href="css/ruang-admin.min.css" rel="stylesheet">
      <link href="css/mecstyle1.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/request3.js"> </script>

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
                <h1 class="h3 mb-0 text-gray-800">Send Request</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Send Request</li>
                </ol>
              </div>

              <form action="request1.php" method="POST" name="frm" id="form">
                <div class="error">
                  <p id="demo"></p>
                </div>
                <table>
                  <tr>
                    <td><label> Vehicle </label></td>
                    <td class="tdi"><select type="catergory" name="category" id="category" required>
                        <option selected disabled value="">Choose Vehicle</option>
                        <?php
                        $sel_query =  mysqli_query($con, "select *from vmodel_tbl");
                        while ($r5 =  mysqli_fetch_array($sel_query)) {
                        ?>
                          <option><?php echo $r5['vmodel']; ?> </option>
                        <?php

                        }
                        ?>
                        <div class="error" id="demo1"></div>
                    </td>
                    </select>

                  </tr>
                  <td><label>Problem</label></td>
                  <td class="tdi"><input type="text" placeholder="Please Enter Your Issue" id="problem" name="problem" required autocomplete="off">
                    <div class="error" id="demo2"></div>
                  </td>
                  </tr>
                  <tr>
                    <?php
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-y h:i:s');

                    ?>
                    <td><label>Date </label></td>
                    <td class="tdi"><input type="text" placeholder="Enter Date" id="date" name="date" value="<?php echo $date ?>" autocomplete="off">
                      <div class="error" id="demo3"></div>
                    </td>
                  </tr>
                  <tr>

                  <tr>
                    <td><label>Destination</label></td>
                    <td class="tdi"><input type="text" placeholder="Enter The Location" id="location" name="location" autocomplete="off">
                      <div class="error" id="demo5"></div>
                    </td>
                  </tr>
                </table>

                <input type="submit" name="Click" class="sub" value="Submit" />
              </form>




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
    if (isset($_POST["Click"])) {
      $category = $_POST["category"];
      $problem = $_POST["problem"];
      $date = $_POST["date"];
      $time = $_POST["time"];
      $location = $_POST["location"];
      $id = $_SESSION['log_id'];
      $sql = "insert into request_tbl(log_id,category,problem,date,location,status)values('$id','$category','$problem','$date','$location','Requested')";
      if (mysqli_query($con, $sql)) {
        if (headers_sent()) {

    ?>
          <script>
            alert("Request Send Successfully");
          </script>
    <?php
          die('<script type="text/javascript">window.location.href="userpanel.php"</script>');
        } else {
          header("location:userpanel.php");
          die();
        }
      }
    }


    mysqli_close($con);
    ?>
<?php
  }
} else {
  if (headers_sent()) {
    die('<script type="text/javascript">window.location.href="log.php"</script>');
  } else {
    header("location:log.php");
    die();
  }
}


?>