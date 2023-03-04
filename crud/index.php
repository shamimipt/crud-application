<?php
include "inc/header.php";
include "user/users.php";

$users = getUsers();

?>

    <div class="main-form-area">
        <div class="container">
            <h3 class="text-center">CRUD Application</h3>
            <div class="row">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['phone'] ?></td>
                            <td><a href="https://<?php echo $user['website'] ?>"><?php echo $user['website'] ?></a></td>
                            <td>
                                <a href="view.php?id=<?php echo $user['id'] ?>"
                                   class="btn btn-sm btn-outline-info">View</a>
                                <a href="update.php?id=<?php echo $user['id'] ?>"
                                   class="btn btn-sm btn-outline-secondary">Update</a>
                                <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php
include "inc/footer.php";