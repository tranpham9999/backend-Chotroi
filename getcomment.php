<?php
	include "connect.php";
	
	$MASP = $_POST['MASP'];
	// $matkhau = $_POST['matkhau'];
	// $taikhoan = "tranpham9999";
	// $matkhau = "123";
	/**
	 * 
	 */

	$mangsp= array();
	$query = "SELECT cmt.MACMT, cmt.MASP, nd.TENDANGNHAP, nd.TENNGDUNG, CONTENT, THOIGIAN, nd.AVATAR FROM COMMENT cmt, NGUOIDUNG nd 
			WHERE nd.TENDANGNHAP = cmt.TENDANGNHAP AND cmt.MASP = '$MASP'";
	$data = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($mangsp, new getdulieu(
										$row['MACMT'],
										$row['MASP'],
										$row['TENDANGNHAP'],
										$row['TENNGDUNG'],
										$row['CONTENT'],
										$row['THOIGIAN'],
										$row['AVATAR']
										));

	}
	echo json_encode($mangsp);
	class getdulieu
	{
		
		function getdulieu($MACMT, $MASP, $TENDANGNHAP, $TENNGDUNG, $CONTENT, $THOIGIAN,  $AVATAR)
		{
			
			$this->MACMT = $MACMT;
			$this->MASP = $MASP;
			$this->TENDANGNHAP = $TENDANGNHAP;
			$this->TENNGDUNG = $TENNGDUNG;
			$this->CONTENT = $CONTENT;
			$this->THOIGIAN = $THOIGIAN;	
			$this->AVATAR = $AVATAR;			

		}
	}

	
	

	
?>