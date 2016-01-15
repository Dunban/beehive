<?php

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
	
	require 'Models/mite_sample_model.php';
	
	$model = new Mite_Sample_Model($con);
	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<?php
		if (isset($_POST['submit']))
		{
			$model->insertdata($con, $_POST['hiveid'], $_POST['date'], $_POST['days'], $_POST['count']);
		}
	?>
	<body>
		<form id="miteinput" action="miteinput.php" method="post">
			<span>Hive Name:<input type="text" name="hiveid"></span>
			<span>Date:<input type="date" name="date"></span>
			<span>Duration:<input type="number" name="days"></span>
			<span>Mite Count:<input type="number" name="count"></span>
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
</html>

<?php
	$con = null;
?>