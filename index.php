<?php include("header.php"); ?>
  
    <div class="container my-5 bg-dark">
        <h1 class="text-center text-uppercase text-success">Clients List</h1><br>
        <?php 
            if(isset($_REQUEST["msg"])){
                if($_REQUEST["clr"] == "success"){
                    echo "<div class='alert alert-success alert-dismissible col-md-12 mx-auto py-1 my-1 mx-auto'>
                            <strong>".$_REQUEST["msg"]."</strong>
                            <button type='button' class='btn-xs btn-close pt-0 outline-none' data-bs-dismiss='alert' aria-label = 'close'></button>
                        </div>";
                    }   else{
                        echo "<div class='alert alert-danger alert-dismissible col-md-12 mx-auto py-1 my-1 mx-auto'>
                                <strong>" . "error:" .$_REQUEST["msg"]."</strong>
                                <button type='button' class='btn-xs btn-close pt-0 outline-none' data-bs-dismiss='alert' aria-label = 'close'></button>
                            </div>";
                    
                }
            }
        ?>
        <a class="btn btn-success" href="./add_user.php" role= "button">Add User</a><br>
        <table class="table table-dark my-4 table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created_AT</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>


                <?php 
                    include("config.php");
                    $sql = "SELECT * from clients";
                    $test = "SELECT COUNT(*) AS count from clients";
                    
                    $result = mysqli_query($conn, $test);
                    echo "hel"; 
                    if ($result) {
                        $row = mysqli_fetch_array($result); // Fetch as an array
                        $rowCount = $row['count'];
                        echo "$rowCount";   
                    }

                    $result = mysqli_query($conn, $sql);

                    while($data = mysqli_fetch_array($result)){
                        echo " 
                            <tr>
                                <td>$data[id]</td>
                                <td>$data[name]</td>
                                <td>$data[email]</td>
                                <td>$data[phone]</td>
                                <td>$data[address]</td>
                                <td>$data[created_at]</td>
                                <td>
                                    <a href='./edit.php?id={$data['id']}'  class='btn btn-primary btn-sm' >Edit</a>
                                    <a href='./delete.php?id={$data['id']}' name='delete' class = 'btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>

                        ";
                    }
                ?>

            </tbody>
        </table>

    </div>

    <?php include("footer.php") ?>