<?php ob_start(); ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Online Bus reservation system</title>



      <link rel="stylesheet" href="css/style.css">


</head>

<body>


<form action="signup.php" method="post" name=f2>
  <h2>Sign Up</h2>
		<p>
			<label for="Name" class="floatLabel">Name</label>
			<input id="Name" name="name" type="text" required/>
		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="email" type="text" required/>
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password" required/>
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password" required/>
			<span>Your passwords do not match</span>
		</p>
		<p>
			<input type="submit" name="s1" value="Create My Account" id="submit">
		<li>
            <a class="signup__link" href="signin.php">I am already a member</a>
          </li>
	</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>



<?php
//if register button is clicked...............
if(isset($_POST['s1'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password1 = $_POST['password'];
  $password2 = $_POST['confirm_password'];
  $date = date('Y-m-d');

  $sql = mysql_connect("localhost","root","password");
  $re = mysql_select_db('dbms');

  //ensure that the form is filled properly

  if(empty($username)) {
    array_push($errors,"Username is required");
  }
  if(empty($email)) {
    array_push($errors,"Email is required");
  }
  if(empty($password_1)) {
    array_push($errors,"password is required");
  }
  if($password_1 != $password_2) {
    array_push($errors,"Your passwords do not match");
  }

  if($name=='' || $email=='' || $password1=='' || $password2=='') {
    ?>
    <script>
    alert('Please fill all the enteries');
    </script>
    <?php
  }

  //if there is no error save user to our dbms databse in table user
  $sql2 = mysql_query("select * from dbms.register where email='email'");
  if(mysql_num_rows($sql2)==0)
  {
    //encrypt password for security
    $password = md5($password1);
    $a = "insert into register(name,email,password,reg_date)
              values('".$name."','".$email."','".$password."','".$date."')";
    $c = mysql_query($a);

    $id = mysql_insert_id();

    $history = $id.'user_history';

    echo "you are Registered Successfully";

    header('location: signin.php');//after Successfull registration signup.php redirect to signin.php

  }
  else {
    ?>
    <script>
    alert("This email id is already Registered");
    </script>
    <?php
  }
}
?>

</body>
</html>
<?php ob_end_flush(); ?>
