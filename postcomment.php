<?php
    require_once('connect.php');
    mysqli_set_charset($conn,'utf8');

    /** Array for JSON response*/

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $masanpham = $_POST['MASP'];
        $tendangnhap = $_POST['TENDANGNHAP'];
        $comment = $_POST['CMT'];
        $thoigian = $_POST['THOIGIAN'];

        // $masanpham = '43';
        // $tendangnhap = 't';
        // $comment = 'asdasdas';
        // $thoigian = '2019-11-12';

        $sqlInsert = "INSERT INTO comment (MASP, TENDANGNHAP, CONTENT, THOIGIAN) VALUES ('$masanpham', '$tendangnhap', '$comment', '$thoigian')";

        $resultInsert = mysqli_query($conn,$sqlInsert);

        if ($resultInsert)
        {
            $result["message"] = "success";
            echo json_encode($result);
        }
        else
        {
            $result["message"] = "false";
            echo json_encode($result);
        }
        echo json_encode($response);
        mysqli_close($conn);
    }
?>