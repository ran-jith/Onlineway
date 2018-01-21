<!DOCTYPE HTML>
<!--
	ComBUS by GECPKD
-->
<html>
	<head>
		<title>info</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/mainabout.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index.html">S5 IT &#160<span> GECPKD</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="Search.html">Search Info</a></li>
					<li><a href="About.html">About</a></li>
					<li><a href="Contact.html">Contact Us</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/bg.jpg" alt="" />
					<div class="inner">
						<header>
						    <h2></h2>
							<p><?php

									// Grab User submitted information
									$source = $_POST['from'];
									$destination = $_POST['to'];
									// Connect to the database
									$con = mysql_connect("localhost","root","password");
									// Make sure we connected successfully
									if(! $con)
									{
										die('Connection Failed'.mysql_error());
									}

									// Select the database to use
									mysql_select_db("dbms",$con);
									$q = mysql_query("select * from route1 where location='$source'") or die(mysql_error());
									$data1 = mysql_fetch_row($q);

									$q = mysql_query("select * from route1 where location='$destination'") or die(mysql_error());
									$data2 = mysql_fetch_row($q);
									if($data1[0]==$data2[0]){
												echo "invalid entry";
											}
									elseif($data2[0]-$data1[0]<0)
									{
									        $q = mysql_query("select * from route2 where location='$source'") or die(mysql_error());
											$data1 = mysql_fetch_row($q);

											$q = mysql_query("select * from route2 where location='$destination'") or die(mysql_error());
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
											echo $data1[1]." To ".$data2[1]."<br>";
											echo "Distance : ".$data3[0]."km"."<br>";
											echo "Fare : ₹ ".$fare."<br>";
											echo "|&nbspBus Name&nbsp|&nbsp&nbsp|&nbspDeparture&nbsp|   &nbsp&nbsp&nbsp&nbsp   |&nbspArrival&nbsp| "."<br>";
											echo "Pavithra &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[3]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[3]."<br>";
											echo "Flywell &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[4]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[4]."<br>";
                                            echo "Kavitha &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[5]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[5]."<br>";
									        echo "TK Bros &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[6]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[6]."<br>";
									}
									else {
                                    $q = mysql_query("select * from route1 where location='$source'") or die(mysql_error());
									$data1 = mysql_fetch_row($q);

									$q = mysql_query("select * from route1 where location='$destination'") or die(mysql_error());
									$data2 = mysql_fetch_row($q);
									if($data2[0]-$data1[0]==1)
											{
												$data3=$data2[2];
												$fare=700;
											}
									
									else {
									$q = mysql_query("select sum(distance) from route1 where id between ($data1[0]+1) and ($data2[0])") or die(mysql_error());
									$data3 = mysql_fetch_row($q);
                                    
									$fare=($data3[0]-4)*0.60+7;
									}
									echo $data1[1]." To ".$data2[1]."<br>";
									echo "Distance : ".$data3[0]."km"."<br>";
									echo "Fare : ₹ ".$fare."<br>";
									echo "|&nbspBus Name|&nbsp&nbsp&nbsp |&nbspDeparture&nbsp|   &nbsp&nbsp&nbsp  |&nbspArrival&nbsp| "."<br>";
									echo "TK Bros &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[3]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[3]."<br>";
									echo "Kavitha &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[4]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[4]."<br>";
                                    echo "Flywell &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[5]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[5]."<br>";
									echo "Pavithra &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$data1[6]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data2[6]."<br>";
                                    }
								?></p>
								
							
						</header>
					</div>
				</article>
			</section>

		


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						
					</ul>
				</div>
				<div class="copyright">
					&copy; ComBUS. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
