<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        require_once 'connect.php';
        $nguoiduocrate = $_POST['nguoiduocrate'];

        $mangsp= array();
        $query = "SELECT RATING FROM rating
                WHERE NGUOIDUOCRATE = '$nguoiduocrate'";
        $data = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($data)) {
            # code...
            array_push($mangsp, new getdulieu(
                                            $row['RATING']
                                            ));

        }
        echo json_encode($mangsp);
        
    }
    class getdulieu
        {
            
            function getdulieu($RATING)
            {
                $this->RATING = $RATING;
            }
        }

?>