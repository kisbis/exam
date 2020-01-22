<?php
require 'db.php';
$message = '';
if (isset ($_POST['personen'])  && isset($_POST['datum']) && isset($_POST['tijd']) && isset($_POST['naam']) && isset($_POST['telefoon']) ) {
    $personen = $_POST['personen'];
    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];
    $naam = $_POST['naam'];
    $telefoon = $_POST['telefoon'];
    $sql = 'INSERT INTO reservation(personen, datum, tijd, naam, telefoon) VALUES(:personen, :datum, :tijd, :naam, :telefoon)';
    $statement = $con->prepare($sql);
    if ($statement->execute([':personen' => $personen, ':datum' => $datum, ':tijd' => $tijd, ':naam' => $naam, ':telefoon' => $telefoon])) {
        $message = 'data inserted successfully';
    }
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create a reservation</h2>
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
                        <input type="text" name="personen" id="personen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="datum">datum</label>
                        <input type="text" name="datum" id="datum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tijd">tijd</label>
                        <input type="text" name="tijd" id="tijd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="naam">naam</label>
                        <input type="text" name="naam" id="naam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">telefoon</label>
                        <input type="text" name="telefoon" id="telefoon" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Create a reservation</button>
                    </div>
                </form>
            </div>
        </div>
        <a class="nav-link" href="reservationcread.php">Back</a>
    </div>
<?php require 'footer.php'; ?>