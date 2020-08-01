<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        require_once 'connect.php';
        $hinhanh = $_POST['hinhanh'];
        $tendangnhap = $_POST['tendangnhap'];
        $tennguoidung = $_POST['tennguoidung'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $sodienthoai = $_POST['sodienthoai'];
        $email = $_POST['email'];

        $upload_path= "upload/avatar/$tendangnhap.jpg";
        $linkimg= "http://192.168.1.3/Server/".$upload_path;

        $query = "UPDATE nguoidung SET
        AVATAR = '$linkimg',
        TENNGDUNG= '$tennguoidung',
        GIOITINH= '$gioitinh',
        NGAYSINH= '$ngaysinh',
        DIACHI= '$diachi',
        SODIENTHOAI= '$sodienthoai',
        EMAIL= '$email'
        WHERE TENDANGNHAP= '$tendangnhap'";

        if(mysqli_query($conn,$query))
        {
            unlink($upload_path);
            file_put_contents($upload_path, base64_decode($hinhanh));
            $result["message"] = "success";
            echo json_encode($result);
        }
        else
        {
            $result["message"] = "error";
            echo json_encode($result);
        }
    }
?>