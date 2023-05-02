<?php  
    function get_revenue($month) {
        require('model/db.php');
        $revenueArray = array();
        for ($i=1; $i<=31; $i++) {
            $revenueDateSum = 0;
            $hireDateNumber = 0;
            if ($i<10) $date = date("Y")."-".$month.'-0'.$i;
            else $date = date("Y")."-".$month.'-'.$i;
            $hireDate = mysqli_query($con, "SELECT * FROM hire WHERE end_time like '$date%'");
            while($row = $hireDate->fetch_object()) {
                $revenueDateSum += $row->revenue;
                $hireDateNumber++;
            }
            $revenueArray[$i]['sum'] = $revenueDateSum;
            $revenueArray[$i]['number'] = $hireDateNumber;
        }
        return $revenueArray;
    }
?>