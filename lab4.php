<?php
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

			
				session_start();

				$_SESSION['uid'] = 42;
				//$test = 43;
				//echo $_SESSION['test'];



				$username=$_POST['userName'];
				$pw=$_POST['pw'];
				//echo "$pw";

				if($username=='' or $pw=='')
				{
					unset($username);
					unset($pw);

				}


				else if(isset($_POST['login']) && isset($username) && isset($pw)){
				//echo "fff";
				$sql= "SELECT userid FROM users WHERE `username`='$username' AND `password`='$pw'";
				mysql_select_db($db);
				

				$ret= mysql_query($sql,$link);
				$retval=mysql_fetch_assoc($ret);


				session_start();

				$_SESSION['uid'] = $retval['userid'];



				//echo $retval['userid'];
				if(! $retval )
				{
				  echo('Could not retrieve data: ' . mysql_error());
				}
				else{
					header('Location: form.php');

				}
				
			}

		


			//}


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

			

				$username=$_POST['nUser'];
				$pw=$_POST['newpw'];

				if($username=='' or $pw=='')
				{
					unset($username);
					unset($pw);

				}
				
				else if(isset($_POST['createUser']) && isset($username) && isset($pw)){
				
				$sql= "INSERT INTO users (username,password) VALUES('$username','$pw')";
				mysql_select_db($db);
				

				$retval = mysql_query($sql,$link);
				if(! $retval )
				{
				  echo('Could not enter data: ' . mysql_error());
				  
				}
				else
				{
				//echo "Successful Registration: Login \n";


				$sql= "SELECT userid FROM users WHERE `username`='$username' AND `password`='$pw'";
				mysql_select_db($db);
				

				$ret= mysql_query($sql,$link);
				$retval=mysql_fetch_assoc($ret);
				//echo $retval['userid'];

				session_start();

				$_SESSION['uid'] = $retval['userid'];



				header('Location: form.php');
				
				}
				
			}

		


			//}
			?>




<html>
	<head>
		<title>Lab 4</title>

		<style>
			#login
			{
				float:left;
				width:50%;
			}
			#newuser
			{
				float:right;
				width:50%;
			}

		</style>

		<script type="text/javascript">
			
			window.addEventListener("load",init,false);

			function init()
			{

			var form=document.getElementById("newForm");
			var form2=document.getElementById("userForm");
			//var l=form.nUser.value;
			//form.addEventListener("submit", check,false);	


			}

			function check(e)
			{
				var form=document.getElementById("newForm");
				var l=form.nUser.value;
				var m=form.newpw.value;

				if(l.length==0 || m.length==0)
					{
						alert("Error in username or password");
						e.preventDefault();
					}
			}


			function checkfirst(e)
			{
				var form2=document.getElementById("userForm");
				var l=form2.userName.value;
				var m=form2.pw.value;
				if(l.length==0 || m.length==0)
					{
						alert("Error in username or password");
						e.preventDefault();

					}

			}

		</script>

		



	</head>

	<body>

		<div id="login">
			<h1>
				Login
			</h1>

			<h2>
				<form id="userForm" method="post" action="" onSubmit="checkfirst()">
					Username: <input type="text" name="userName">
					<br />
					Password: <input type="password" name="pw">
					<br />
					<input type="submit" name="login" value="Login">
				</form>
			</h2>
			
		</div>


		<!-- ========================================================================================================-->

		<div id="newuser">
			<h1>
				Register
			</h1>

			<h2>
				<form id="newForm" method="post" action= "" onSubmit="check()">
					Choose Username: <input type="text" name="nUser">
					<br />
					Enter Password: <input type="password" name="newpw">
					<br />
					<input type="submit" name="createUser" value="Create">
				</form>
			</h2>

			


		</div>



	</body>



</html>
