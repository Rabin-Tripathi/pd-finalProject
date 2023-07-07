<?php
session_start();
if (isset($_SESSION['SESSION_ADMIN'])) {
    if (!$_SESSION['SESSION_ADMIN']) {
        header("Location: /pd-finalProject/home");
        die();
    }
}

$id = $title = $description = $url = $startsAt = $endsAt = $category = $location = $genderRepresentation = $imageURL = $award = $winner = $runner = "";
$titleError = $descriptionError = $urlError = $startsAtError = $endsAtError = $categoryError = $locationError = $genderRepresentationError = $imageURLError = $awardError = $winnerError = $runnerError = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require "../config.php";

    //prepare an sql statement
    $sql = "SELECT * FROM broadcast WHERE id = ?";

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
            $title = $row["title"];
            $description = $row["description"];
            $category = $row["category_id"];
            $location = $row["location"];
            $genderRepresentation = $row["gender_representation"];
            $url = $row["url"];
            $startsAt = $row["starts_at"];
            $endsAt = $row["ends_at"];
            $imageURL = $row["image_url"];
            $award = $row["award"];
            $winner = $row["winner"];
            $runner = $row["runner_up"];
        }
        $statement->close();
    }
    $conn->close();

}


// post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST['id']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category = (int) trim($_POST['category']);
    $location = trim($_POST['location']);
    $genderRepresentation = trim($_POST['gender_representation']);
    $url = trim($_POST['url']);
    $startsAt = trim($_POST['starts_at']);
    $endsAt = trim($_POST['ends_at']);
    $imageURL = trim($_POST["imageURL"]);
    $award = trim($_POST["award"]);
    $winner = trim($_POST["winner"]);
    $runner = trim($_POST["runner"]);


    if ($title == '') {
        $titleError = 'Title field is required!';
    }

    if ($description == '') {
        $descriptionError = 'Description field is required!';
    }

    if ($category == '') {
        $categoryError = 'Category field is required!';
    }

    if ($location == '') {
        $locationError = 'Location field is required!';
    }

    if ($genderRepresentation == '') {
        $genderRepresentationError = 'Gender Representation field is required!';
    }

    if ($url == '') {
        $urlError = 'Url field is required!';
    }

    if ($startsAt == '') {
        $startsAtError = 'Starts at field is required!';
    }

    if ($endsAt == '') {
        $endsAtError = 'Ends at field is required!';
    }

    if ($imageURL == '') {
        $imageURLError = 'Image is required!';
    }


    if ($award == '') {
        $award = 'Event Name is required!';
    }


    if ($winner == '') {
        $winnerError = 'Winner Name is required!';
    }


    if ($runner == '') {
        $runnerError = 'Runner-up Name is required!';
    }


    if ($titleError == "" && $descriptionError == "" && $urlError == "" && $startsAtError == "" && $endsAtError == "" && $imageURLError == "" && $awardError == "" && $winnerError == "" && $runnerError == "") {
        require "../config.php";

        $sql = 'UPDATE broadcast SET title="' . $title . '", description="' . $description . '", category_id="' . $category . '", location="' . $location . '", gender_representation="' . $genderRepresentation . '", url="' . $url . '", starts_at="' . $startsAt . '", ends_at="' . $endsAt . '", image_url ="' . $imageURL . '", award ="' . $award . '", winner ="' . $winner . '", runner_up ="' . $runner . '" WHERE id = "' . $id . '"';
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: broadcast-d.php");
            mysqli_close($conn);
        } else {
            echo "Error Updating record" . mysqli_error($conn);
        }
    }
}
?>

<?php
require "../config.php";

$query = "SELECT * FROM category";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<?php include '../config.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Broadcast</title>
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
                <h1>EDIT BROADCAST</h1>
                <a href="broadcast-d.php">
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
                        <label for="title">Title</label>
                        <div class="in-box">
                            <input type="text" name="title" class="form-control" value="<?= $title; ?>">
                            <p class="text-danger-edit">
                                <?= $titleError ?>
                            </p>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <div class="in-box">
                            <textarea name="description" class="form-control" rows="6"><?= $description; ?></textarea>
                            <p class="text-danger-edit">
                                <?= $descriptionError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <div class="in-box">
                            <select name="category" class="form-control">
                                <option value=""></option>
                                <?php
                                foreach ($options as $option) {
                                    ?>
                                    <?php echo "<option value={$option['id']}" ?>
                                    <?php if ($category == $option['id'])
                                        echo "selected" ?>
                                    <?php echo ">" ?>
                                    <?php echo "{$option['name']}" ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger-edit">
                                <?= $categoryError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <div class="in-box">
                            <input type="text" name="location" class="form-control" value="<?= $location; ?>">
                            <p class="text-danger-edit">
                                <?= $locationError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender_representation">Gender Representation</label>
                        <div class="in-box">
                            <select name="gender_representation" class="form-control">
                                <option value=""></option>
                                <option value="Male" <?php if ($genderRepresentation == "Male")
                                    echo "selected" ?>>Male
                                    </option>
                                    <option value="Female" <?php if ($genderRepresentation == "Female")
                                    echo "selected" ?>>
                                        Female</option>
                                    <option value="Hybrid" <?php if ($genderRepresentation == "Hybrid")
                                    echo "selected" ?>>
                                        Hybrid</option>
                                </select>
                                <p class="text-danger-edit">
                                <?= $genderRepresentationError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='url'>Url</label>
                        <div class="in-box">
                            <input type="text" name="url" value="<?= $url; ?>" class="form-control">
                            <p class="text-danger-edit">
                                <?= $urlError ?>
                            </p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for='starts_at'>Starts At</label>
                        <div class="in-box">
                            <input type="datetime-local" value="<?= $startsAt; ?>" name="starts_at"
                                class="form-control">
                            <p class="text-danger-edit">
                                <?= $startsAtError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='ends_at'>Ends At</label>
                        <div class="in-box">
                            <input type="datetime-local" value="<?= $endsAt; ?>" name="ends_at" class="form-control">
                            <p class="text-danger-edit">
                                <?= $endsAtError ?>
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

                    <div class="form-group">
                        <label for="award">Event Name</label>
                        <div class="in-box">
                            <input type="text" name="award" class="form-control" value="<?= $award; ?>">
                            <p class="text-danger-edit">
                                <?= $awardError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="winner"> Winner </label>
                        <div class="in-box">
                            <input type="text" name="winner" class="form-control" value="<?= $winner; ?>">
                            <p class="text-danger-edit">
                                <?= $winnerError ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="runner">Runner Up</label>
                        <div class="in-box">
                            <input type="text" name="runner" class="form-control" value="<?= $runner; ?>">
                            <p class="text-danger-edit">
                                <?= $runnerError ?>
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