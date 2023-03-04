<?php
include "inc/header.php";
require "user/users.php";

if (!isset($_GET['id'])) {
    include "inc/not-found.php";
    exit;
}

$userId = $_GET['id'];
$user = getUserById($userId);

if (!$user) {
    include "inc/not-found.php";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
     $user = updateUser($_POST, $userId);

    if(isset($_FILES['image'])){
        // check is dir is have or not, not have create one
        if(!is_dir(__DIR__ . '/user/images/')){
            mkdir(__DIR__ . '/user/images/');
        }

        $filename = $_FILES['image']['name'];
        $dotPosition = strpos($filename, '.');
        $extension = substr($filename, $dotPosition + 1);

        // Move the uploaded file to destination
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . "/user/images/$userId.$extension");
        $user['extension'] = $extension;
        updateUser($user, $userId);
    }
    header('Location: index.php');
}


?>

<div class="update-user">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>Update User : <?php echo $user['name']; ?></h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="name" >Name</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Name" value="<?php echo $user['name']; ?>">
                        <label for="username" >User name</label>
                        <input type="text" class="form-control" name="username" id="" placeholder="Name" value="<?php echo $user['username']; ?>">
                        <label for="email" >User name</label>
                        <input type="email" class="form-control" name="email" id="" placeholder="Name" value="<?php echo $user['email']; ?>">
                        <label for="phone" >Phone</label>
                        <input type="text" class="form-control" name="phone" id="" placeholder="Name" value="<?php echo $user['phone']; ?>">
                        <label for="website" >Website</label>
                        <input type="text" class="form-control" name="website" id="" placeholder="Name" value="<?php echo $user['website']; ?>">
                        <label for="Image" >User name</label>
                        <input type="file" class="form-control" name="image" id="" >
                        <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "inc/footer.php";
