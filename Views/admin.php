<?php
    include '../PHP/Classes/PHPExcel.php';
    
    include '../PHP/Classes/PHPExcel/Writer/Excel2007.php';
    
    $excelmite = new PHPExcel();
    $excelmite->getProperties()->setCreator("Danny")
                                ->setLastModifiedBy("Danny")
                                ->setTitle("Mite Count Spreadsheet")
                                ->setSubject("Mite Count for ". date('M Y'))
                                ->setDescription("Mite count from local beehives.")
                                ->setKeywords("office 2007 openxml php")
                                ->setCategory("Mites");
    
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
    $sql = "SELECT * FROM mite_sample";
    $result = $con->query($sql);
    
    $excelmite->setActiveSheetIndex(0);

    
    $excelmite->getActiveSheet()->SetCellValue("A1", "Hive ID");
    $excelmite->getActiveSheet()->SetCellValue("B1", "Collected On");
    $excelmite->getActiveSheet()->SetCellValue("C1", "# of Days");
    $excelmite->getActiveSheet()->SetCellValue("D1", "# of Mites");
    $excelmite->getActiveSheet()->SetCellValue("E1", "Submitted On");
    
    $index = 2;
    
    foreach ($result as $row)
    {
        $excelmite->getActiveSheet()->SetCellValue("A$index", $row['hive_id']);
        $excelmite->getActiveSheet()->SetCellValue("B$index", $row['date_collected']);
        $excelmite->getActiveSheet()->SetCellValue("C$index", $row['sample_period']);
        $excelmite->getActiveSheet()->SetCellValue("D$index", $row['mite_count']);
        $excelmite->getActiveSheet()->SetCellValue("E$index", $row['submitted']);
        $index++;
    }
    
    $mitewrite = new PHPExcel_Writer_Excel2007($excelmite);
    $mitewrite->save(str_replace('.php', '.xlsx', __FILE__)); 
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Beehive Mite Count Display</title>
	</head>
    <body>
        <a href="admin.xlsx" target="_blank">Download Spreadsheet</a>
    </body>
</html>