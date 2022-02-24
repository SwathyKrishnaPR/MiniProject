<?php
session_start();
include "connect.php";

if (isset($_SESSION['log_id'])) {

  $id = $_SESSION['log_id'];
  $query = "SELECT * FROM log_tbl where log_id ='$id'";
  $res = mysqli_query($con, $query);
  $r = mysqli_fetch_array($res);


  $log = $_POST['log'];
  $req = $_POST['req'];




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
    <link href="css/assignmech.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""> </script>

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


          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
              <h1 class="h3 mb-0 text-gray-800">Mechanic Registration</h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registration</li>
              </ol>
            </div>

            <form action="#" method="POST" name="frm" id="form">
              <div class="error">
                <p id="demo"></p>
              </div>
              <table>
               
                <td><label>Assign to</label></td>
                <td class="tdi"><select type="mechanic" name="mechanic" id="mechanic" onchange="change_phoneno();">
                    <option selected disabled value="">Assign Mechanic</option>
                    <?php
                    $sel_query =  mysqli_query($con, "select *from mec_tbl");
                    while ($r5 =  mysqli_fetch_array($sel_query)) {
                    ?>
                      <option value="<?php echo $r5['mec_id']; ?>"><?php echo $r5['mname']; ?> <?php echo $r5['mlname']; ?></option>
                    <?php

                    }
                    ?>
                  </select>
                  <div class="error" id="demo2"></div>
                </td>
                </tr>
                <tr>
                  <td><label>Phone no</label></td>
                  <td class="tdi">
                    <div class="error" id="pno">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label>Arriving Time</label></td>
                  <td class="tdi"><input type="text" placeholder="Enter The Time" id="time" name="time" autocomplete="off">
                    <div class="error" id="demo3"></div>
                  </td>
                </tr>

                <tr>
                  <td><label> Remark </label></td>
                  <td class="tdi"><input type="text" placeholder="Enter the remark" name="remark" id="remark" autocomplete="off">
                    <div class="error" id="demo1"></div>
                  </td>
                </tr>

              </table>
              <input type="text" name="req" value='<?php echo $req; ?>' hidden />
              <input type="text" name="log" value='<?php echo $log; ?>' hidden />
              <input type="submit" name="submit1" class="sub" value="Submit" />
            </form>
            <php ?>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

              <script>
                function change_phoneno() {
                  var phno = $("#mechanic").val();

                  $.ajax({
                    type: "POST",
                    url: "spec.php",
                    data: "phno=" + phno,
                    cache: false,
                    success: function(response) {

                      //alert(response);return false;
                      $("#pno").html(response);
                    }
                  });

                }
              </script>
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
  if (isset($_POST["submit1"])) {
    $log = $_POST["log"];
    $req = $_POST["req"];
    $mechanic = $_POST["mechanic"];
    $time = $_POST["time"]; 
    $remark = $_POST["remark"];?>
    <script>
      alert($log);
    </script>
    <?php
    $sql = "insert into assign_tbl(log_id,req_id,remark,mechanic,time)values('$log','$req','$remark','$mechanic','$time')";
    if (mysqli_query($con, $sql)) {

      $sel_query1 = "UPDATE request_tbl SET status = 'Approved' WHERE req_id ='$req' and log_id='$log'";
      $result = mysqli_query($con, $sel_query1);

      if (headers_sent()) {
        ?>

        <script>
          alert("Assigned Mechanic SucessFully");
        </script>
    <?php
        die('<script type="text/javascript">window.location.href="AllRequest.php"</script>');
      } else {
        header("location:adminpanel.php");
        die();
      }
    } else {
    ?>

      <script>
        alert("error");
      </script>
  <?php
    }
  }

  mysqli_close($con);
  ?>
<?php
}




?>