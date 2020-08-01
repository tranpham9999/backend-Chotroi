<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		require_once 'connect.php';
		// require_once 'login.php';

		if($conn){
			$masp = $_POST["masp"];
			// $masp = "55";

			$sql="DELETE FROM sanpham WHERE MASP='$masp'";
			

			if(mysqli_query($conn, $sql)){
				$result["message"] = "success";
	            echo json_encode($result);
	            echo "true";

			}
			else{
				 $result["message"] = "error";
	            echo json_encode($result);
	            echo "failed";
			}

		}
		else{
			$result["message"] = "Failed!!!";
			echo "cant connect";
	        echo json_encode($result);
		}
	}
?>