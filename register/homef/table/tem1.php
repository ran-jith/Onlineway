<?php
session_start();
$From = (isset($_GET['from']) ? $_GET['from'] : '');
?>


<!DOCTYPE HTML>
<!--
	ComBUS by GECPKD
-->
<html>
	<head>
		<title>info</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="tem.css" />
	</head>
	<body>




<?php

									// Grab User submitted information
								//	$From = $_POST['from'];
									$To = $_POST['to'];
									// Connect to the database
									$con = mysql_connect("localhost","root","password");
									// Make sure we connected successfully
									if(! $con)
									{
										die('Connection Failed'.mysql_error());
									}

									// Select the database to use
									mysql_select_db("dbms",$con);
									$q = mysql_query("select * from route1 where location='$From'") or die(mysql_error());
									$data1 = mysql_fetch_row($q);

									$q = mysql_query("select * from route1 where location='$To'") or die(mysql_error());
									$data2 = mysql_fetch_row($q);
									if($data1[0]==$data2[0]){
												echo "invalid entry";
											}
									elseif($data2[0]-$data1[0]<0)
									{
									        $q = mysql_query("select * from route2 where location='$From'") or die(mysql_error());
											$data1 = mysql_fetch_row($q);

											$q = mysql_query("select * from route2 where location='$To'") or die(mysql_error());
											$data2 = mysql_fetch_row($q);
											if($data2[0]-$data1[0]==1)
											{
												$data3=$data2[2];
												$fare=7;
											}
											else {
											
											$q = mysql_query("select sum(distance) from route2 where id between ($data1[0]+1) and ($data2[0])") or die(mysql_error());
											$data3 = mysql_fetch_row($q);
											
											$fare=($data3[0]-4)*0.60+7;
									        }
												?>


<section>
  <!--for demo wrap-->
  <h1><?php echo $data1[1]." To ".$data2[1]."<br>"; ?></h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Bus Name</th>
          <th>Distance</th>
          <th>Start Time</th>
          <th>Stop Time</th>
          <th>Fare</th>
		  <th>Book</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
			          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        
        
      </tbody>
    </table>
  </div>
</section>


<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥</i> by
  <a target="_blank" href="https://codepen.io/nikhil8krishnan">Nikhil Krishnan</a>
</div>





<!--
<?php
}
else
{
	header("Location:tem1.php");
}


?>
-->

</body>
</html>
