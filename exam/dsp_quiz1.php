<?php

#Copyright by Serge Skudaev, 2005

 include('auth.php');

if(($qnumber=="")||($qnumber==0))
{
$qnumber=1;


}
else
{
$qnumber=$qnumber+1;
}


#dsp_quiz1.php

include('database_access_param.php');


$answers = array();
$question="";
$answerblock=array();
$rightanswer=array();

$db_link=mysql_connect($hostname, $dbuser, $dbpassword) or die("Unable to connect to the server!");

			mysql_select_db($dbname) or die("Unable to connect to the database.");






$sql = "select * from questions where qnumber=".$qnumber ;
//echo "questions:".$sql."<br>";

		print('<html>');
		print('<head><title>');
		print('Quiz 1</title>');
		print('<link rel="stylesheet" href="report.css">');

		print("</head>");
		print('<body>');
		print('<form name=myform method="post" action="index.php?boxaction=savegrade">');
		print('<table class="report" align=left width=100%>');
		print('<tr><th align=left colspan=2>Quiz</th></tr>');
		print('<tr><td>&nbsp;</td></tr>');

		$result=mysql_query($sql);

;

		if(mysql_numrows($result))
		{
				$row = mysql_fetch_row($result);
				{

				$qid=$row[0];
				$question=$row[1];
				$answers[0]=$row[2];
				$answers[1]=$row[3];
				$answers[2]=$row[4];
				$answers[3]=$row[5];

				$qnumber=$row[6];

				$rightanswer=$row[2];

	print('<tr><td >'.$qnumber.'&nbsp;&nbsp;&nbsp;'.$question.'</td></tr>');


	srand((float) microtime() * 10000000);

	$rand_keys = array_rand($answers, 4);


    $answer0=$answers[$rand_keys[0]] ;
     $answer1=$answers[$rand_keys[1]] ;
      $answer2=$answers[$rand_keys[2]] ;
       $answer3=$answers[$rand_keys[3]] ;



	print('<tr><td><input type="radio" name=answer value="'.$answer0 .'">&nbsp;&nbsp;&nbsp;'.$answer0.'</td></tr>');

	print('<tr><td><input type="radio" name=answer value="'.$answer1 .'">&nbsp;&nbsp;&nbsp;'.$answer1 .'</td></tr>');

	print('<tr><td><input type="radio" name=answer value="'.$answer2 .'">&nbsp;&nbsp;&nbsp;'.$answer2 .'</td></tr>');

	print('<tr><td><input type="radio" name=answer value="'.$answer3 .'">&nbsp;&nbsp;&nbsp;'.$answer3 .'</td></tr>');

	print('<tr><td>&nbsp;<input type=hidden name=rightanswer value="'.$rightanswer.'"><input type= hidden name=qnumber value="'.$qnumber.'"></tr>');


						}
	print('<tr><td colspan=2><input type=submit name=submit value="Submit" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset name=reset value="Clear" ></td></tr></table>');


	print('<p>You cannot go back and resubmit an answer.&nbsp;System counts every submit and it affects your score</p>');



	}
	else
	{


	print('<input type =hidden name=score value="'.$score.'">');
	print('<tr><td colspan=2align=center><input type=submit name=submit value="Grade" ></td></tr></table>');
	print('</form>');

	}


	print('</body>');
	print('</html>');


?>