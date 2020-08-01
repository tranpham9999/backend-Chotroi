<?php
	include "connect.php";
	
	// $taikhoan = $_POST['taikhoan'];
	// $matkhau = $_POST['matkhau'];
	// $taikhoan = "tranpham9999";
	// $matkhau = "123";
	/**
	 * 
	 */
	$sdt = $_POST['MASP'];

	$mangsp= array();
	$query = "SELECT SDT FROM SANPHAM
			WHERE MASP = '$sdt'";
	$data = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($mangsp, new getdulieu(
										$row['SDT'],

										));

	}
	echo json_encode($mangsp);
	class getdulieu
	{
		
		function getdulieu($SDT )
		{
			
			$this->SDT = $SDT;
		}
	}

	
	

	
?>