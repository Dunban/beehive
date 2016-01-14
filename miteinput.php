<?php
	try
	{
		$con = new PDO("mysql: host=localhost; dbname=doubled_bee_database", $username, $password);
	}
	catch (PDOException $ex)
	{
		echo 'Error connecting to database: ' . $ex->getMessage();
	}

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
			$sql = "INSERT INTO mite_sample (hive_id, date_collected, sample_period, mite_count)
				VALUES (:id, :date, :days, :count)";
				
			$prepared = $con->prepare($sql);
			
			$prepared->bindParam(':id', $_POST['hiveid'], PDO::PARAM_STR);
			$prepared->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
			$prepared->bindParam(':days', $_POST['days'], PDO::PARAM_INT);
			$prepared->bindParam(':count', $_POST['count'], PDO::PARAM_INT);
			
			$result = $prepared->execute();
			if ($result)
			{
				echo 'ConGRADulations! you have submitted data.';
			}
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