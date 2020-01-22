
<?php



include 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}


$sql = 'SELECT * FROM pizza';
$statement = $con->prepare($sql);
$statement->execute();
$pizza = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>All people</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php foreach($pizza as $pizza): ?>
                    <tr>
                        <td><?= $pizza->id; ?></td>
                        <td><?= $pizza->name; ?></td>
                        <td>&euro;<?= $pizza->price; ?></td>
                        <td><?= $pizza->description; ?></td>
                        <td>
                            <a href="pizzaedit.php?id=<?= $pizza->id ?>" class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="pizzadelete.php?id=<?= $pizza->id ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <a class="nav-link" href="pizzacreate.php">Create a pizza</a>

<?php require 'footer.php'; ?>