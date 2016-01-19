<?php

	ini_set('display_errors', 1);
    error_reporting(E_ALL);

	$user = "doubled_DB";
	$pass = "Thoud0n0tKnow";
	
	try
	{
		$con = new PDO("mysql: host=localhost; dbname=doubled_bee_database", $user, $pass);
	}
	catch (PDOException $ex)
	{
		echo 'Error connecting to database: ' . $ex->getMessage();
	}
	
	require '../Models/mite_sample_model.php';
	
	$model = new Mite_Sample_Model($con);
	
	if (isset($_POST['submit']))
		{
			$model->insertdata($con, $_POST['hiveid'], $_POST['date'], $_POST['days'], $_POST['count']);
		}
		
	$con = null;
?>