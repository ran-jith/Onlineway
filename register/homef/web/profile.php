<?php
session_start();
if(isset($_SESSION['id']))
{
?>








<!DOCTYPE html>
<html>
<head>
<title><==Edit your profile==></title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>



<?php

require("config.php");
$uid=$_SESSION['id'];
$sql = mysql_query("select * from register where id = '$uid'");
$r = mysql_fetch_array($sql);

$name = $r['name'];
$email = $r['email'];
$password = $r['password'];
?>


</head>
<body>
<!--header-->
	<div class="header-w3l">
		<h1>Edit your profile</h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
	<h2 class="sub-head">Profile</h2>
		<div class="sub-main">	
			<form  method="post">


				<tr><td width="93"> Name:</td><td width="307"> <input style="width:300" <class="name" type="text" value="<?php echo $name; ?>"  readonly="readonly"></td></tr>

				 <span class=""><i class="fa fa" aria-hidden="true"></i></span><br>

<!-- here iam disabled all icons -->


				<tr><td width="93"> Email:</td><td width="307"> <input style="width:300"  class="name" type="text" value="<?php echo $email; ?>"  readonly="readonly"></td></tr>

					<span class=""><i class="fa fa" aria-hidden="true"></i></span><br>



					<tr><td width="93"> Password:</td><td width="307"> <input style="width:300"  class="name" type="text" value="<?php echo $password; ?>"  readonly="readonly"></td></tr>				
					<span class=""><i class="fa fa-" aria-hidden="true"></i></span><br>

</form>



		<!--
				</tr><tr><td align="center" colspan="3" style="padding-right:435">

-->
<!--
<a href="/homet/register/homef/profile-update.php?id=<?php echo $uid; ?>">EDIT</a>
<a href="/homet/register/homef/Home.php?id=<?php echo $uid; ?>">Back</a>
</td></tr>
-->


<form action="profile-update.php?id=<?php echo $uid; ?>">
    <input type="submit" value="Edit" />
</form>


<form action="/homet/register/homef/Home.php?id=<?php echo $uid; ?>">
    <input type="submit" value="Back" />
</form>

<!--footer-->
<div class="footer-w3">
	<p>&copy; Please don't edit your password here right now.. <a href="notice.html">why i cannot see my password as plain text</a></p>
</div>
<!--//footer-->


<?php
}
else
{
	header("Location:/homet/register/homef/homef/Home.php?id=$uid");
}
?>




</body>
</html>
