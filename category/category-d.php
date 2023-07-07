<?php
session_start();
if (isset($_SESSION['SESSION_ADMIN'])) {
    if (!$_SESSION['SESSION_ADMIN']) {
        header("Location: /pd-finalProject/home");
        die();
    }
}
?>

<?php include '../config.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Category</title>
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
                <h1>CATEGORIES</h1>
                <p>
                    <a href="./create.php" style="margin-top:20px">
                        CREATE CATEGORY
                    </a>
                </p>
            </div>
            <?php
            require "../config.php";

            $sql = 'SELECT * FROM category';
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Category Name</th><th>&nbsp;&nbsp;&nbsp;&nbsp;Actions&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>";
                        echo "<a class='edit' href='./edit.php?id=" . $row["id"] . "'><i class='fa fa-edit'></i> | </a>";
                        echo "<a class= 'delete' href='./delete.php?id=" . $row["id"] . "'><i class='fa fa-trash' onclick='return confirmDelete()'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            ?>
        </div>
    </div>
    <?php require "../component/footer.php" ?>
</body>

</html>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to Delete?");
    }
</script>