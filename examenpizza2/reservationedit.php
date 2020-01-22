<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM reservation WHERE id=:id';
$statement = $con->prepare($sql);
$statement->execute([':id' => $id ]);
$reservation = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['personen'])  && isset($_POST['datum']) && isset($_POST['telefoon']) ) {
    $personen = $_POST['personen'];
    $datum = $_POST['datum'];
    $telefoon = $_POST['telefoon'];
    $sql = 'UPDATE reservation SET personen=:personen, price=:price, telefoon=:telefoon WHERE id=:id';
    $statement = $con->prepare($sql);
    if ($statement->execute([':personen' => $personen, ':datum' => $datum, ':telefoon' => $telefoon, ':id' => $id])) {
        header("Location: reservationread.php");
    }
}
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update reservation</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="personen">personen</label>
                        <input value="<?= $reservation->personen; ?>" type="text" name="personen" id="personen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="datum">datum</label>
                        <input type="datum" value="<?= $reservation->datum; ?>" name="datum" id="datum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefoon">telefoon</label>
                        <input type="telefoon" value="<?= $reservation->telefoon; ?>" name="telefoon" id="telefoon" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update reservation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>