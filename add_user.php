<?php include("header.php"); ?>

<div class="container my-5">
    <h1 class="text-uppercase text-center text-white py-3">New Client</h1>

    

        <?php 
            if(isset($_REQUEST["error"])){
                $errorMessage = urldecode($_REQUEST["error"]);
                echo "<div class='alert alert-danger alert-dismissible col-md-5 mx-auto py-1 my-1 mx-auto'>
                    <strong>" . "error:" . $errorMessage. "</strong>
                    <button type='button' class='btn-xs btn-close pt-0 outline-none' data-bs-dismiss='alert' aria-label = 'close'></button>
                </div>";
            }
        ?>
    <form method="post">

        <div class="row my-3 d-flex justify-content-center">
            <label class="text-white col-sm-1 col-form-label">Name: </label>
            <div class="col-sm-4 col-form-label">
                <input type="text" name="name" class="rounded form-control" >
            </div>
        </div>

        <div class="row my-3 d-flex justify-content-center">
            <label class="text-white col-sm-1 col-form-label">Email: </label>
            <div class="col-sm-4 col-form-label">
                <input type="email" name="email" class="rounded form-control" >
            </div>
        </div>

        <div class="row my-3 d-flex justify-content-center">
            <label class="text-white col-sm-1 col-form-label">Phone: </label>
            <div class="col-sm-4 col-form-label">
                <input type="number" name="phone" class="rounded form-control" >
            </div>
        </div>

        <div class="row my-3 d-flex justify-content-center">
            <label class="text-white col-sm-1 col-form-label">Address: </label>
            <div class="col-sm-4 col-form-label">
                <!-- <textarea name="address" class="rounded form-control" ></textarea> -->
                <input type="text" name="address" class="rounder form-control">
            </div>
        </div>

        <div class="row my-3 d-flex justify-content-center">
            <div class="offset-sm-1 col-sm-2 d-grid">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>
            <div class="col-sm-2 d-grid">
                <a class="btn btn-outline-danger" href="./index.php" role="button">Cancel</a>
            </div>
        </div>

    </form>

</div>

<?php include("footer.php") ?>

<?php 
    if(isset($_REQUEST["submit"])){
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $phone = $_REQUEST["phone"];
        $address = $_REQUEST["address"];

        // echo " $name";
        include("config.php");

        $query = "INSERT into clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        $result = mysqli_query($conn, $query);
        if($result>0){
            // echo "<script>window.location.assign('add_user.php?msg=Client added Successfully!&clr=success'</script>";
            echo "<script>window.location.assign('index.php?msg=Record Inserted!!!&clr=success')</script>";
            
        }   else{
            // echo "<script>window.location.assign('add_user.php?msg=Please try Again!&clr=danger')</script>";
            $error = mysqli_error($conn);
            $errorMessage = urlencode($error);
            echo "<script>window.location.assign('add_user.php?error=$errorMessage')</script>";
        }
    }
?>

