<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['price']) && isset($_POST['description']) ) {
    $name = $_POST['name'];
    $price   = $_POST['price'];
    $description   = $_POST['description'];
    $sql = 'INSERT INTO pizza(name, price, description) VALUES(:name, :price, :description)';
    $statement = $con->prepare($sql);
    if ($statement->execute([':name' => $name, ':price' => $price , ':description' => $description])) {
        $message = 'data inserted successfully';
    }
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create a pizza</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="price" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="description" name="description" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Create a pizza</button>
                    </div>
                </form>
            </div>
        </div>
        <a class="nav-link" href="pizzaread.php">Back</a>
    </div>
<?php require 'footer.php'; ?>