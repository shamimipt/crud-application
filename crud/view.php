<?php
require "inc/header.php";
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

?>

    <div class="view-user">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3>View user : <?php echo $user['name']; ?></h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <td><?php echo $user['name']; ?></td>
                            </tr>
                            <tr>
                                <th>user name:</th>
                                <td><?php echo $user['username']; ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td><?php echo $user['phone']; ?></td>
                            </tr>
                            <tr>
                                <th>Website:</th>
                                <td><a href="https://<?php echo $user['website']; ?>"><?php echo $user['website']; ?></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require "inc/footer.php";