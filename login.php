<?php
//if(isset($_POST['submit']))
//{
$username = "root";
$password = "";
$hostname = "localhost"; 
$database = "kbadata";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password , $database) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>LOGIN Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body background="abc.jpg">
  <section class="container">
    <br><br><br><br><br><br><br><br><br><br><br><div align="center" class="lOGIN">
      <h1>Login</h1>
	  
	  <?php
if(isset($_POST['remember_me']))
{
$username = mysqli_real_escape_string($dbhandle,$_POST['login']);

$pass = mysqli_real_escape_string($dbhandle,$_POST['password']);

$sel_user = "select * from login where username='$username' AND password='$pass'";

$run_user = mysqli_query($dbhandle, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user>0){

$_SESSION['username']=$username;

echo "<script>window.open('admission.html','_self')</script>"; 
}
else 
{
echo "<script>alert('Email or password is not correct, try again!')</script>";
}
}
?>

      <form method="post" action="index.html">
        <p><input type="text" name="login" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
       </label>
      </p>
     <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
   </div>
  </section>
 </body>
</html>