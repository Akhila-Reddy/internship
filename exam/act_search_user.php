<?php

#Copyright by Serge Skudaev, 2005

 include('auth.php');
include('database_access_param.php');

	import_request_variables("pgc","");



	if(($firstname =="")&&($lastname==""))
		{

		echo "<p align=center><b>Please fill the last or first name fields.</b><br>";
		$newaction='useroption';
		include('index.php');

		//echo "<p align=center><b>Please fill the last and first name fields.</b><br>";
		//echo '<a href="index.php?&boxaction=useroption">Go Back</a>';
		}
		else{



		if($lastname !="")
		{

		$sql="select * from students where lastname LIKE '".$lastname."%' ";

		}
		elseif($firstname !="")
		{
		$sql="select * from students where firstname LIKE '".$firstname."%' ";
		}



	$db_link = mysql_connect($hostname, $dbuser, $dbpassword) or die ('Unable to connect to the server.');

				mysql_select_db($dbname) or die ("Unable to connect to db");

				$result=mysql_query($sql) or die ('Unable execute the query');

				if(mysql_numrows($result))
				{


	print('<html>');
	print('<head><title>');
	print('View Users</title>');
	print('<link rel="stylesheet" href="style.css">');

	print("</head>");
	print('<body>');

	print("<br><br>");
				 include('mainmenu.php');
	print("<br>");


	print('<br><br>');
	print('<table class="aaa" align=center width=70%>');
	print('<tr><td colspan=4 align=center>The User Table</td></tr>');
	print('<tr>');

print('<th>N</th><th>First Name:</th><th>Last Name:</th><th>User:</th><th>Password:</th><th>Email:</th><th>Role:</th><th>Delete:</th><th>Edit:</th></tr>');



					while($row = mysql_fetch_row($result))
					{
						$stid=$row[0];
						$lastname=$row[1];
						$firstname=$row[2];
						$username=$row[3];

						$password=$row[4];
						$email=$row[5];
						$arole=$row[6];







						print('<tr>');
						echo'<td>'.$stid.'</td><td>'.$firstname.'</td><td>'.$lastname.'</td><td>'.$username.'</td><td>'.$password.'</td><td>'.$email.'</td><td>'.$arole.'</td><td align=center><a href="index.php?arole='.$arole.'&stid='.$stid.'&boxaction=deleteuser">Delete</a></td><td align=center><a href="index.php?arole='.$arole.'&password1='.$password.'&email='.$email.'&stid='.$stid.'&username='.$username.'&firstname='.$firstname.'&lastname='.$lastname.'&boxaction=edituser">Edit</a></td></tr>';

					}

			print('</table>');


			print('</body></html>');


			}else{
			print("No record found<br>");

			$newaction='useroption';
			include('index.php');




			//echo '<a href="index.php?&boxaction=useroption">Search Again</a>';

			}
}

		?>







