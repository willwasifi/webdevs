<html>
	<head>
		<style>
			#loginhalf{background-color: pink;}
			#formhalf{
				
				color:black;
				background-color: lightblue;
				margin-top: 5px;
				margin-right:50px;
				width: 6%;
				margin-bottom: 2em;
				}
			.last{display: none;}

		</style>

		<script type="text/javascript">
			

		/*	function init()
			{
				document.getElementById("month");
				alert(month.value);

			}


			function hey()
			{
				document.getElementById("month");
				alert(month.value);


			}

			window.addEventListener("load",init,false);*/

		</script>

	</head>


	<body>

		<div id="loginhalf">
		<?php 
		//include 'lab4.php';
		echo "YOU ARE NOW LOGGED IN!";
	

		?>
		</div>

		<div id="formhalf">
			Welcome!
		</div>

		<div>

			<form name="info" method="post">
				Date:
				<select name="month" id="month">
					<option value="01" selected="selected">January</option>
					<option value="02" >February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>

				<select name="day">
					<option value="01" selected="selected">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>

				<br />

				Time:

				<select name="hour">
					<option value="00" selected="selected">0</option>
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
				</select>


				<select name="minute">
					<option value="00" selected="selected">:00</option>
					<option value="30">:30</option>
				</select>


				<br />
				Message:
				<br />

				<textarea name="message" rows="15" cols="50"> </textarea>

				<br />
				Email:
				<br />
				<textarea name="email" rows="1" cols="50"> </textarea>
				<br />
				<br />
				<input type="submit" name="submit" value="Submit">

			</form>

		</div>

	</body>


</html>




<?php 
		
		session_start();

		$x=$_SESSION['uid'];

		//echo $_SESSION['uid'];

		//echo "heyyy";


	
		$a=$_POST['submit'];
		if(isset($a))
		{
		



			$user = 'root';
			$password = 'root';
			$db = 'mysql';
			$host = 'localhost:3306';
			$port = 3306;

			$link = mysql_connect(
			   $host, 
			   $user, 
			   $password
			);
			if(!$link )
			{
			  die('Could not connect: ' . mysql_error());
			}



			$month=$_POST['month'];
			$day=$_POST['day'];
			$hour=$_POST['hour'];
			$minute=$_POST['minute'];
			$message=$_POST['message'];
			$email=$_POST['email'];

			$time=$month.$day.$hour.$minute;
			


			$sql= "INSERT INTO message (userid,emailaddress,message,tstamp,sent) VALUES('$x','$email', '$message','$time','false')";
				mysql_select_db($db);
				

				$retval = mysql_query($sql,$link);
				if(! $retval )
				{
				  echo('Could not enter data: ' . mysql_error());
				  
				}
				else
				{
				echo "Sent form! \n";
				
				
				}




		}
		


	





?>

