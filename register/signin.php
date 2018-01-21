<?php ob_start(); ?>
<?php
require("user_agent.php");
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Online Bus-Ticket Reservation</title>



      <link rel="stylesheet" href="css/style.css">


</head>

<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="f">
  <h2>Sign In</h2>

		<p>
			<label for="Email" class="floatLabel"><b><font size="5">Email</b></font></label>
			<input id="user" name="user" type="text" value="" required/>
		</p>
		<p>
			<label for="password" class="floatLabel"><b><font size="5">Password</b></font></label>
			<input id="pass" name="pass" type="password" required/>

		</p>

		<p>
			<input type="submit" onclick="validate()" value="Enter Into My Account" name="s" id="submit">
		<li>
            <a class="signup__link" href="signup.php">I am not a member</a>
          </li>
	</form>

<?php
session_start();
require('config.php');
if(isset($_POST['s'])) {
  $name = $_POST['user'];
  $pass = $_POST['pass'];
  //ensure that the form filled properly
  //////////////////////////////////////
    $pass = md5($pass);

    $sql = mysql_query("select * from register where email='$name' and password='$pass'");
    if(mysql_num_rows($sql)==0)
    {
      ?>
      <script>
      alert("You are not registered yet! Please register first and then try to login");
      </script>
      <?php
    }
    else {
        ?>
        <script>
        alert("Welcome to Home page");
        </script>
        <?php
        $sql1 = mysql_query("select * from register where email='$name' and password='$pass'");
        $r = mysql_fetch_array($sql1);
        $id = $r['id'];
        echo $_SESSION['id'] = $id;
        header("Location:homef/Home.php?id=$id");

    }
}
 ?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
