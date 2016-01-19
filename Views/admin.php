<?php
    include '../PHP/Classes/PHPExcel.php';
    
    include '../PHP/Classes/PHPExcel/Writer/Excel2007.php';
    
    $excelmite = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("Danny")
                                ->setLastModifiedBy("Danny")
                                ->setTitle("Mite Count Spreadsheet")
                                ->setSubject("Mite Count for ". echo date('M Y'))
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
    
    $model = new Mite_Sample_Model($con);
    
    $result = $model->retrieveall($con);
    
    $excelmite->setActiveSheetIndex(0);
    $index = 1;
    
    for ($result as $row)
    {
        $excelmite->getActiveSheet()->SetCellValue("A$index", $row['hive_id']);
        $excelmite->getActiveSheet()->SetCellValue("B$index", $row['date_collected']);
        $excelmite->getActiveSheet()->SetCellValue("C$index", $row['sample_period']);
        $excelmite->getActiveSheet()->SetCellValue("D$index", $row['mite_count']);
        $excelmite->getActiveSheet()->SetCellValue("E$index", $row['submitted']);
    }
    
    $mitewrite = new PHPExcel_Writer_Excel2007($excelmite);
    $mitewrite->save(str_replace('.php', '.xlsx', __FILE__)); 
?>