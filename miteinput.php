<?php
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
	<body>
        <?php
            
        ?>
		<form id="miteinput" action="miteinput.php" method="post">
			<span>Hive Name:<input type="text" name="hiveid"></span>
			<span>Date:<input type="date" name="date"></span>
			<span>Duration:<input type="number" name="days"></span>
			<span>Mite Count:<input type="number" name="count"></span>
			<input type="submit"
		</form>
	</body>
</html>