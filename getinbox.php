<?php
	include "connect.php";
	
	$tendangnhap = $_POST['tendangnhap'];

	$mangsp= array();
	$query = "SELECT m.* ,u.*
    FROM
      messages m
      INNER JOIN (
            SELECT max(ID) as maxid
            FROM messages
            WHERE messages.TENDANGNHAP = '$tendangnhap'
            OR messages.SENDTOTENDANGNHAP = '$tendangnhap'             
            GROUP BY (if(TENDANGNHAP > SENDTOTENDANGNHAP,  TENDANGNHAP, SENDTOTENDANGNHAP)), 
            (if(TENDANGNHAP > SENDTOTENDANGNHAP,  SENDTOTENDANGNHAP, TENDANGNHAP))
           ) t1 ON m.ID=t1.maxid 
      JOIN 
      nguoidung u  ON u.TENDANGNHAP = (CASE WHEN m.TENDANGNHAP = '$tendangnhap'
                             THEN m.SENDTOTENDANGNHAP
                             ELSE m.TENDANGNHAP        
                         END)";

	$data = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($mangsp, new getdulieu(
										$row['ID'],
										$row['TENDANGNHAP'],
										$row['SENDTOTENDANGNHAP'],
										$row['MESSAGE'],
										$row['TENNGDUNG'],
										$row['AVATAR'],
										));

	}
	echo json_encode($mangsp);
	class getdulieu
	{
		
		function getdulieu($ID, $TENDANGNHAP, $SENDTOTENDANGNHAP, $MESSAGE, $TENNGDUNG, $AVATAR)
		{
			
			$this->ID = $ID;
			$this->TENDANGNHAP = $TENDANGNHAP;
			$this->SENDTOTENDANGNHAP = $SENDTOTENDANGNHAP;
			$this->MESSAGE = $MESSAGE;
			$this->TENNGDUNG = $TENNGDUNG;
			$this->AVATAR = $AVATAR;
			
		}
	}

	
	

	
?>