
<?php 
    if(isset($_REQUEST["id"])){

        $id = $_REQUEST['id'];
        
        include("config.php");
        $query = "DELETE from clients where id = '$id'";
        $result = mysqli_query($conn, $query);


        if($result>0){
            echo "<script>window.location.assign('index.php?msg=Record Deleted!!!&clr=success')</script>";
        }
        else{
            $error = mysqli_error($conn);
            $errorMessage = urlencode($error);
            echo "<script>window.location.assign('index.php?msg=$errorMessage&clr=danger')</script>";

        }
    }

?>