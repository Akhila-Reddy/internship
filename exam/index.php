<?php
###########################################################################
# START AUTHENTICATION                                                    #
###########################################################################

extract($_POST, EXTR_PREFIX_ALL, "req");


if (!isset($user)||(!isset($pass))) {	header("Location: index.html"); }

###########################################################################
# END AUTHENTICATION                                                      #
###########################################################################

#Author Serge Skudaev, 2004

	include('database_access_param.php');


			if(isSet($newaction))
			$boxaction=$newaction;


		switch ($boxaction){

			case "home":
				include('home.php');
			break;

			case "help":

			include('help.htm');

			break;


			case "module1":

				include('module1.html');

			break;



			case "quiz1":

					include('dsp_quiz1.php');

			break;


			case "actgrade":

						include('act_grade_quiz.php');

			break;

			case "savegrade":

						include('save_grade.php');

			break;


			case "viewscores":

				include('view_scores.php');

			break;

			case "resetexam":

				include('reset_user_exam.php');

			break;

			case "viewall":

			include('scores_to_all.php');

			break;



			case "actsaveanswer":

			include('act_save_answer.php');

			break;

			case "useroption":

			include('auser_option.php');

			break;


			case "adduser":

				include('add_user_form.php');
			break;

			case "actadduser":

				include('act_add_user.php');
			break;

			case "viewusers":

				include('view_users_form.php');
			break;

			case "viewuser":

				include('view_user_form.php');
			break;

			case "deleteuser":

				include('act_delete_user.php');
			break;

			case "edituserpwd":

					include('edit_userpwd.php');
			break;


			case "actedituserpwd":

					include('act_edit_userpwd.php');

			break;

			case "actsearchuser":

			include('act_search_user.php');

			break;

			case "actupdateuser":

				include('act_update_user.php');

			break;

			case "edituser":

			include('view_user_form.php');

			break;




			case "logout":

				include('logout.php');
			break;


			case "default":


				include('home.php');
			break;
	}






?>
