<?php
	require "connect.php";
	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];

	// $taikhoan = "tranpham9999";
	// $matkhau = "123";
	/**
	 * 
	 */
	function gettk(){
		if(isset($_POST['taikhoan'])){
			$bar = $_POST['taikhoan']; // data comes from a html form on another page.
            $str = strtoupper($bar);

            return $str;
		}
	}
	class Dangnhap
	{
		
		function Dangnhap( $user, $password)
		{
			
			$this->TENDANGNHAP = $user;
			$this->MATKHAU = $password;
		


		}
	}

	if (strlen($taikhoan) > 0 && strlen($matkhau) > 0) {
		$query = "SELECT * FROM nguoidung WHERE FIND_IN_SET('$taikhoan',TENDANGNHAP) AND FIND_IN_SET('$matkhau', MATKHAU)";
		$data = mysqli_query($conn, $query);
		$mangtk = array();
		if($data){
			while ($row = mysqli_fetch_assoc($data)) {
				# code...
				array_push($mangtk, new Dangnhap($row['TENDANGNHAP'],
												$row['MATKHAU']));
			}
			if(count($mangtk)>0){
				echo json_encode($mangtk);

			}else{
				echo "Fail";
			}
		}

	}else{
		echo "NULL";
	}
?>