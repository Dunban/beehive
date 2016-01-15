<?php
    class Mite_Sample_Model
    {
		var $con;
		
        public function __construct(PDO $con)
        {
            $this->con = $con;
        }
    
        public function insertdata($con, $id, $date, $days, $count)
        {
            $sql = "INSERT INTO mite_sample (hive_id, date_collected, sample_period, mite_count)
				VALUES (:id, :date, :days, :count)";
				
			$prepared = $con->prepare($sql);
			
			$prepared->bindParam(':id', $id, PDO::PARAM_STR);
			$prepared->bindParam(':date', $date, PDO::PARAM_STR);
			$prepared->bindParam(':days', $days, PDO::PARAM_INT);
			$prepared->bindParam(':count', $count, PDO::PARAM_INT);
			
			$result = $prepared->execute();
			
			if($result)
			{
				echo "ConGRADulations!Data input successfully!";
			}
        }
    }
?>