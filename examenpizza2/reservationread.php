
<?php



include 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}


$sql = 'SELECT * FROM reservation';
$statement = $con->prepare($sql);
$statement->execute();
$reservation = $statement->fetchAll(PDO::FETCH_OBJ);
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
                    <th>personen</th>
                    <th>datum</th>
                    <th>tijd</th>
                    <th>naam</th>
                    <th>telefoon</th>
                </tr>
                <?php foreach($reservation as $reservation): ?>
                    <tr>
                        <td><?= $reservation->id; ?></td>
                        <td><?= $reservation->personen; ?></td>
                        <td>&euro;<?= $reservation->datum; ?></td>
                        <td><?= $reservation->tijd; ?></td>
                        <td><?= $reservation->naam; ?></td>
                        <td><?= $reservation->telefoon; ?></td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="reservationdelete.php?id=<?= $reservation->id ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <a class="nav-link" href="reservationcread.php">Create a reservation</a>

<?php require 'footer.php'; ?>