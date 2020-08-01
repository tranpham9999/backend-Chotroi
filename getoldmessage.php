<?php
	include "connect.php";
	
	$sendfrom = $_POST['sendfrom'];
	$sendto = $_POST['sendto'];
	

	$mangsp= array();
	$query = "SELECT ID, MESSAGE, ms.TENDANGNHAP, SENTAT, SENDTOTENDANGNHAP, TENNGDUNG  FROM messages ms, nguoidung nd
			WHERE ((ms.TENDANGNHAP = '$sendfrom' AND SENDTOTENDANGNHAP = '$sendto') OR (ms.TENDANGNHAP = '$sendto' AND SENDTOTENDANGNHAP = '$sendfrom')) AND nd.TENDANGNHAP = ms.TENDANGNHAP
			ORDER BY ID ASC
			";
	$data = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($mangsp, new getdulieu(
										$row['ID'],
										$row['MESSAGE'],
										$row['TENDANGNHAP'],
										$row['SENTAT'],
										$row['SENDTOTENDANGNHAP'],
										$row['TENNGDUNG']
										));

	}
	echo json_encode($mangsp);
	class getdulieu
	{
		
		function getdulieu($ID, $MESSAGE, $TENDANGNHAP, $SENTAT, $SENDTOTENDANGNHAP, $TENNGDUNG)
		{
			
			$this->ID = $ID;
			$this->MESSAGE = $MESSAGE;
			$this->TENDANGNHAP = $TENDANGNHAP;
			$this->SENTAT = $SENTAT;
			$this->SENDTOTENDANGNHAP = $SENDTOTENDANGNHAP;
			$this->TENNGDUNG = $TENNGDUNG;
		}
	}

	
	

	
?>