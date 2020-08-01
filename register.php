<?php
if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $name = $_POST['name'];
    $matkhau = $_POST['matkhau'];
    $hovaten = $_POST['hovaten'];
    $ngaysinh = $_POST['ngaysinh'];

    

    require_once 'connect.php';

    $sql = "INSERT INTO nguoidung (TENDANGNHAP, MATKHAU, TENNGDUNG, NGAYSINH) VALUES ('$name', '$matkhau', '$hovaten', '$ngaysinh')";

    if ( mysqli_query($conn, $sql)) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>