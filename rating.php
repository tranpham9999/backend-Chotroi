<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        require_once 'connect.php';
        $nguoirate = $_POST['nguoirate'];
        $nguoiduocrate = $_POST['nguoiduocrate'];
        $rating = $_POST['rating'];

        //Xét trường hợp vote cho chính bản thân mình
        if($nguoirate == $nguoiduocrate){
            $result["message"] = "Bạn không thể vote cho chính bản thân bạn";
            echo json_encode($result);
        }
        else{
            $query = "SELECT * FROM rating WHERE NGUOIDUOCRATE = '$nguoiduocrate' AND NGUOIRATE = '$nguoirate'";
            $data =  mysqli_query($conn,$query);
            if(mysqli_fetch_assoc($data)!=null){
                //đã rate rồi nên chỉ update lại rate
                $sql = "UPDATE rating 
                        SET RATING = '$rating'
                        WHERE NGUOIRATE= '$nguoirate' AND NGUOIDUOCRATE = '$nguoiduocrate'";

                if(mysqli_query($conn,$sql))
                {
                    $result["message"] = "success";
                    echo json_encode($result);
                }
                else
                {
                    $result["message"] = "error";
                    echo json_encode($result);
                }

            }else{
                //chưa rate nên insert rate
                $sql = "INSERT INTO rating (RATING, NGUOIRATE, NGUOIDUOCRATE) VALUES ('$rating', '$nguoirate', '$nguoiduocrate')";
                if(mysqli_query($conn,$sql))
                {
                    $result["message"] = "success";
                    echo json_encode($result);
                }
                else
                {
                    $result["message"] = "error";
                    echo json_encode($result);
                }
            }
        }



        
    }
?>