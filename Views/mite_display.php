<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Beehive Mite Count Display</title>
	</head>
    <body>
		<form id="miteinput" action="../Control/mite_control.php" method="post">
			<span>Hive Name:<input type="text" name="hiveid"></span>
			<span>Date:<input type="date" name="date"></span>
			<span>Duration:<input type="number" name="days"></span>
			<span>Mite Count:<input type="number" name="count"></span>
			<input type="submit" name="submit" value="Submit">
		</form>
	</body>
</html>