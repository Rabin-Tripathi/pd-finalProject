<?php
session_start();
if (isset($_SESSION['SESSION_ADMIN'])) {
    if (!$_SESSION['SESSION_ADMIN']) {
        header("Location: /pd-finalProject/home");
        die();
    }
}

$id = $name = $imageURL = "";
$nameError = $imageURLError = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require "../config.php";

    //prepare an sql statement
    $sql = "SELECT * FROM category WHERE id = ?";

    if ($statement = $conn->prepare($sql)) {
        $statement->bind_param("i", $c_id);
    }

    $id = $_GET['id'];
    $c_id = trim($id);

    if ($statement->execute()) {
        $result = $statement->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $id = $row["id"];
            $name = $row["name"];
        }
        $statement->close();
    }
    $conn->close();

}


// post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $imageURL = trim($_POST['imageURL']);

    if ($name == '') {
        $nameError = 'Name field is required!';
    }

    if ($imageURL == '') {
        $imageURLError = 'Image is required!';
    }

    if ($nameError == "" and $imageURLError == "") {
        require "../config.php";

        $sql = "UPDATE category SET name='$name', img_url='$imageURL' WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: category-d.php");
            mysqli_close($conn);
        } else {
            echo "Error Updating record" . mysqli_error($conn);
        }
    }
}
?>

<?php include '../config.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <?php require "../component/header.php" ?>
    <div class="contain-main">

        <div class="box">
            <div class="contain-title">
                <h1>EDIT CATEGORY</h1>
                <a href="category-d.php" style="margin-top:20px">
                    <i class="fas fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="form-container">
                <form action="edit.php" method="POST">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <div class="in-box">
                            <input style="border: none;" type="text" name="id" class="form-control" value="<?= $id; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <div class="in-box">
                            <input type="text" name="name" class="form-control" value="<?= $name; ?>">
                            <p class="text-danger-edit">
                                <?= $nameError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imageURL">Image URL</label>
                        <div class="in-box">
                            <input type="text" name="imageURL" class="form-control" value="<?= $imageURL; ?>">
                            <p class="text-danger-edit">
                                <?= $imageURLError ?>
                            </p>
                        </div>
                    </div>

                    <input type="Submit" value="EDIT BROADCAST" class="btn-submit">
                </form>
            </div>
        </div>
    </div>
    <?php require "../component/footer.php" ?>
</body>

</html>