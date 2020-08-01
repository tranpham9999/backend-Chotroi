<?php
	include "connect.php";
	$search = $_POST['search'];
	$abc = "%".$search."%";
	// $taikhoan = $_POST['taikhoan'];
	// $matkhau = $_POST['matkhau'];
	// $taikhoan = "tranpham9999";
	// $matkhau = "123";
	/**
	 * 
	 */

	$mangsp= array();
	$query = "SELECT sp.MASP, TENSP, GIA, HINHANH, THONGTIN, sp.MALOAISP, nd.TENNGDUNG, AVATAR, TINHTRANG, sp.DIACHI, TENLOAISP, nd.TENDANGNHAP FROM SANPHAM sp, NGUOIDUNG nd, LOAISANPHAM lsp 
			WHERE XETDUYET = '1' AND nd.TENDANGNHAP = sp.TENDANGNHAP AND lsp.MALOAISP = sp.MALOAISP AND (TENSP LIKE '$abc' OR sp.DIACHI LIKE '$abc')
			ORDER BY sp.MASP DESC";
	$data = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($data)) {
		# code...
		array_push($mangsp, new getdulieu(
										$row['MASP'],
										$row['TENSP'],
										$row['GIA'],
										$row['HINHANH'],
										$row['THONGTIN'],
										$row['MALOAISP'],				
										$row['TENNGDUNG'],
										$row['AVATAR'],
										$row['TINHTRANG'],
										$row['DIACHI'],
										$row['TENLOAISP'],
										$row['TENDANGNHAP']
										));

	}
	echo json_encode($mangsp);
	class getdulieu
	{
		
		function getdulieu($MASP, $TENSP, $GIA, $HINHANH, $THONGTIN, $MALOAISP,  $TENNGDUNG,  $AVATAR, $TINHTRANG, $DIACHI, $TENLOAISP, $TENDANGNHAP )
		{
			
			$this->MASP = $MASP;
			$this->TENSP = $TENSP;
			$this->GIA = $GIA;
			$this->HINHANH = $HINHANH;
			$this->THONGTIN = $THONGTIN;
			$this->MALOAISP = $MALOAISP;	
			$this->TENNGDUNG = $TENNGDUNG;
			$this->AVATAR = $AVATAR;
			$this->TINHTRANG = $TINHTRANG;
			$this->DIACHI = $DIACHI;
			$this->TENLOAISP = $TENLOAISP;
			$this->TENDANGNHAP = $TENDANGNHAP;
			

		}
	}

	
	

	
?>