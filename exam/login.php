<?php



$hostname = "localhost";

$dbuser = "root";

$dbpassword = "";

$dbname = "exam";





$username = $_POST['username'];

 $password = $_POST['password'];







 $password=md5($password);







// the word password has code 5f4dcc3b5aa765d61d8327deb882cf99

//use it to create the first password for you admin user.

//insert directly in students table



//insert into students(stid, lastname, firstname, username, password, email, role) values (0, 'sergey', 'skudaev','sergeys','5f4dcc3b5aa765d61d8327deb882cf99','sergeys@yahoo.com','admin');







$auth = false; // Assume user is not authenticated



if (isset( $username ) && isset($password)) {



    // Connect to MySQL



    mysql_connect( $hostname, $dbuser, $dbpassword)

        or die ( 'Unable to connect to server. (login)' );



    // Select database on MySQL server



   	mysql_select_db($dbname )

        or die ( 'Unable to select database.(login)' );



    // Formulate the query



    $sql="SELECT * FROM students WHERE username = '".$username."' AND password = '".$password."'";







    // Execute the query and put results in $result



    $result = mysql_query( $sql )

        or die ( 'Unable to execute query.' );



    // Get number of rows in $result.



    $num = mysql_numrows( $result );







    if ( $num == 1 ) {





        $auth = true;







		$row=mysql_fetch_row($result);



			$usero=$row[3];

			$passo=$row[4];

			$role=$row[6];







		setcookie("user","");

		setcookie("pass","");

		setcookie("role","");

		setcookie("pass",$passo);

		setcookie("user",$usero);

		setcookie("role",$role);











    }



}



if ( ! $auth ) {



	header("Location:index.html");





} else {





   header("Location:home.php");







}

?>

