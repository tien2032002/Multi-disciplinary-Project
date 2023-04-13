<?php
    $bikeArray = array('0001', '0002', '0003', '0004', '0005', '0006', '0007', '0008', '0009', '0010');
    $customerArray = array ('123456789001', '123456789011', '123456789056');
    for ($i=0;$i<31;$i++) {
        $date = mktime(6,0,0, 4, $i, 2023);
        for ($j=0;$j<100;$j++) {
            $bike = $bikeArray[rand(0, count($bikeArray)-1)];
            $customer = $customerArray[rand(0, count($customerArray)-1)];
            $startTime = mktime(rand(0,23), rand(0,60), rand(0,60), 4, $i, 2023);
            $totalTime = mktime(rand(0,23), rand(0,60), rand(0,60), 4, $i, 2023);
            $test = mktime(12,0,0,4,$i,2023);
            //echo date("Y-m-d h:i:s", $startTime) . ", " .date("h:i:s", $totalTime). ', '. date("Y-m-d h:i:s", $startTime+$totalTime-$test);
            $revenue = round(idate('h', $totalTime) + idate('s', $totalTime)/60, 2);
            echo "INSERT INTO `hire` (`customer_id`, `bike_id`, `start_time`, `end_time`, `total_time`, `revenue`, `report`) VALUES ('$customer', '$bike', '".date("Y-m-d h:i:s", $startTime)."', '".date("Y-m-d h:i:s", $startTime+$totalTime-$test)."', '".date("h:i:s", $totalTime)."', '".$revenue*9000 ."', NULL);";
            echo "<br>";
        }
    }
    //echo "INSERT INTO `hire` (`customer_id`, `bike_id`, `started_time`, `end_time`, `total_time`, `revenue`, `report`) VALUES ('123456789011', '0009', '2023-04-03 06:31:00', '2023-04-03 15:31:00', '09:00:00', '90000', NULL);"
?>