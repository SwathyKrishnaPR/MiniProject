<?php
	include("connect.php");
?>
<html lang="en">
<head>
  <meta charset="UFT-8">
<title>Registration Form</title>
<link rel="stylesheet"  href="css/register1.css">
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/reg5.js"> </script>
</head>
<body>
<div class="frm">
  <div class="header">
<h2>Register</h2>
</div>
<form action="register1.php" method="POST" name="frm" id="form" >
<div class="error"><p id="demo"></p></div>
<table align="center">
<tr>
<td><label> First Name </label></td>
<td class="tdi"><input type="text" placeholder="Enter The First Name" name="name" id="name"autocomplete="off">
<div class="error" id="demo0"></div></td>
</tr>
<tr>
<td><label> Last Name </label></td>
<td class="tdi"><input type="text" placeholder="Enter The Last Name" name="lname" id="lname"autocomplete="off">
<div class="error" id="demo1"></div></td>
</tr>
<td><label>Address </label></td>
<td class="tdi"><textarea rows="5"cols="20" placeholder="Enter your Address" id="address" name="address" autocomplete="off"></textarea>
<div class="error" id="demo2"></div></td>
</tr> 
<tr>
<td><label>Email </label></td>
<td class="tdi"><input type="text"placeholder="Enter The Email Id" id="email" name="email" autocomplete="off">
<div class="error" id="demo3"></div></td>
</tr>
<tr>
<td><label>Phone no  </label></td>
<td class="tdi"><input type="text"placeholder="Enter The Phone Number"id ="mphone" name="mphone"autocomplete="off">
<div class="error" id="demo4"></div></td>
</tr>
<tr>
<td><label>User Name </label></td>
<td class="tdi"><input type="text"placeholder="Enter Your User Name" id="uname" name="uname"autocomplete="off">
<div class="error" id="demo5"></div></td>
</tr>
<tr>
<td><label>Password </label></td>
<td class="tdi"><input  name="pass" type="password" id="pass" placeholder="Enter Your Password"autocomplete="off" />
<div class="error" id="demo6"></div></td>
</tr>
<br>
<tr>
<td><label>Confirm Password</label></td>
<td class="tdi"><input  name="cpass" type="password" id="cpass" placeholder="Re-Enter Your Password"autocomplete="off" />
<div class="error" id="demo7"></div></td>
</tr><br>
<tr>
  <td><input type ="hidden" name="usertype" value="user"></td>
    </tr>
    
</table>

<button type="submit" name="Click" >Register</button>
<div class="footer">
Already have Account?<a href="log.php"> Login</a>
</div>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST["Click"]))
{
$name=$_POST["name"];
$lname=$_POST["lname"];
$address=$_POST["address"];
$email=$_POST["email"];
$mphone=$_POST["mphone"];
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
  $sql="insert into reg_tbl(name,lname,log_id,address,email,mphone)values('$name','$lname','$last_id','$address','$email','$mphone')";  
if(mysqli_query($con,$sql))
{ 
  if(headers_sent())
  {
  die('<script type="text/javascript">window.location.href="log.php"</script>');
  }
  else{
  header("location:log.php");
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