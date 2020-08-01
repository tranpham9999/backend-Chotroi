    <?php
    require_once "connect.php";

    if($conn){

        $taikhoandanglogin = $_POST['taikhoan'];
        // $taikhoandanglogin = "t";
        $mangsp= array();
        $query = "SELECT TENNGDUNG, AVATAR, TENDANGNHAP, NGAYSINH, GIOITINH, DIACHI, SODIENTHOAI, EMAIL FROM nguoidung  WHERE TENDANGNHAP = '$taikhoandanglogin'";
        $result = mysqli_query($conn, $query);

        class nguoidung
        {
            function nguoidung($TENNGDUNG, $AVATAR, $TENDANGNHAP, $NGAYSINH, $GIOITINH, $DIACHI,  $SODIENTHOAI, $EMAIL)
            {
                $this->TENNGDUNG = $TENNGDUNG;
                $this->AVATAR = $AVATAR;
                $this->TENDANGNHAP = $TENDANGNHAP;
                $this->NGAYSINH = $NGAYSINH;
                $this->GIOITINH = $GIOITINH;
                $this->DIACHI = $DIACHI;
                $this->SODIENTHOAI = $SODIENTHOAI;
                $this->EMAIL = $EMAIL;
            }
        }
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($mangsp, new nguoidung(
                                            $row['TENNGDUNG'],
                                            $row['AVATAR'],
                                            $row['TENDANGNHAP'],
                                            $row['NGAYSINH'],
                                            $row['GIOITINH'],
                                            $row['DIACHI'],                 
                                            $row['SODIENTHOAI'],
                                            $row['EMAIL']
                                            ));

        }
        
        echo json_encode($mangsp);

    }
   
?>