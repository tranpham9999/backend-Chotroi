<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		require_once 'connect.php';
		// require_once 'login.php';

		if($conn){
			$hinhanh = $_POST["hinhanh"];
			$tensp = $_POST["tensp"];
			$gia = $_POST["gia"];
			$thongtin = $_POST["thongtin"];
			$tendangnhap = $_POST["tendangnhap"];
			$maloaisp = $_POST["maloaisp"];
			$tinhtrang = $_POST["tinhtrang"];
			$diachi = $_POST["diachi"];
			$sdt = $_POST["sdt"];

			$upload_path= "upload/$tensp.jpg";

			$linkimg= "http://192.168.1.3/Server/".$upload_path;

			$sql="INSERT INTO sanpham (TENSP, GIA, THONGTIN, HINHANH, MALOAISP, TENDANGNHAP, TINHTRANG, DIACHI, SDT, XETDUYET) VALUES ('$tensp', '$gia', '$thongtin', '$linkimg', '$maloaisp', '$tendangnhap', '$tinhtrang', '$diachi', '$sdt', '0')";
			


			if(mysqli_query($conn, $sql)){
				file_put_contents($upload_path, base64_decode($hinhanh));
				$result["message"] = "success";
	            echo json_encode($result);

			}
			else{
				 $result["message"] = "error";
	            echo json_encode($result);
			}

		}
		else{
			echo json_encode(array("response"=>"Failedd!!"));
			myslqi_close($conn);
		}
	}
?>