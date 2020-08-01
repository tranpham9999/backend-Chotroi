<?php
    // if($_SERVER["REQUEST_METHOD"]=="POST")
    // {
        include "connect.php";
        $tendangnhap = $_POST['tendangnhap'];
        $matkhaucu = $_POST['matkhaucu'];
        $matkhaumoi =$_POST['matkhau'];

        // $tendangnhap = "t";
        // $matkhaucu = "123";
        // $matkhaumoi ="123";

        $timmatkhau = "SELECT MATKHAU FROM nguoidung WHERE TENDANGNHAP = '$tendangnhap' AND MATKHAU = '$matkhaucu'";
        $data = mysqli_query($conn, $timmatkhau);

        if(mysqli_num_rows($data) > 0 ){
            $sql = "UPDATE nguoidung SET MATKHAU = '$matkhaumoi' WHERE TENDANGNHAP = '$tendangnhap'";
            if(mysqli_query($conn, $sql)){
                $result["message"] = "Đổi mật khẩu thành công!!!";
                echo json_encode($result);
            }
            else{
                $result["message"] = "Đổi mật khẩu thất bại. Vui lòng nhập lại!!!";
                echo json_encode($result);
            }
        }
        else{
            $result["message"] = "Sai mật khẩu cũ. Vui lòng nhập lại!!!";
                echo json_encode($result);
        
        }


        
?>