<?php
session_start();
?>

<?php include './config.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="/pd-finalProject/css/style.css">
</head>

<body>
    <?php require "./component/header.php" ?>
    <div class="contain-main">
        <div class="box">
            <div class="bg" style="margin: 0px auto;">
                <img width="100%" height="400px" style="object-fit:content; object-position: 50% 50%;  "
                    src="/pd-finalProject/images/output.png" alt="">
            </div>
            <div style="display:flex; justify-content:center; flex-direction: column;">
                <div class="contain-title" style="padding-bottom: 24px;">
                    <h1>Results</h1>
                </div>

                <?php
                require "./config.php";

                $sql = "SELECT b.award, b.winner, b.runner_up from broadcast b WHERE b.winner IS NOT NULL AND b.runner_up IS NOT NULL";

                if ($result = $conn->query($sql)) {
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Competition</th><th>Winner</th><th>Runner Up</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["award"] . "</td>";
                            echo "<td>" . $row["winner"] . "</td>";
                            echo "<td>" . $row["runner_up"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <?php require "./component/footer.php" ?>
</body>

</html>