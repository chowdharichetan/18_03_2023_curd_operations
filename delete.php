<?php 

include('connect.php');

    if(isset($_GET['deleteid'])) {

            $id = $_GET['deleteid'];
            $sql = "DELETE FROM user_meta WHERE user_id = $id"; 
            $results = mysqli_query($con, $sql);

            if($results) {
                // echo "Deleted Successfully";
                header('location:display.php');
            }
            else {
                die(mysqli_error($con));
            }
    }

?>
