<?php
session_start();

//  include '../notify.php';

function getStatus($startsAt, $endsAt)
{
    $currentTime = time();

    $convertedStartsAt = strtotime($startsAt);
    $convertedEndsAt = strtotime($endsAt);

    if ($currentTime < $convertedStartsAt) {
        return "NOT YET AIRED";
    } elseif ($currentTime > $convertedEndsAt) {
        return "COMPLETED";
    } else {
        return "ONGOING";
    }
}

$sql;
require "../config.php";

$viewingBroadcasts = true;
$viewingCategory = false;
$userId = isset($_SESSION['SESSION_ID']) ? (int) $_SESSION['SESSION_ID'] : FALSE;
$categoryThumbnail = null;

if (isset($_GET['broadcast'])) {
    $viewingBroadcasts = false;
    $broadcastId = (int) mysqli_real_escape_string($conn, $_GET['broadcast']);
    $_SESSION["SESSION_CURRENT_BROADCAST"] = $broadcastId;
    $sql = "SELECT b.id, b.title, b.description, b.image_url, c.name as category, b.url, b.location, b.gender_representation, b.starts_at, b.ends_at FROM broadcast b INNER JOIN category c on b.category_id = c.id WHERE b.id={$broadcastId};";

    if ($resultSelect = $conn->query("SELECT * from broadcast_notification bn left join broadcast b on bn.broadcast_id=b.id where bn.user_id=$userId AND bn.broadcast_id=$broadcastId AND b.starts_at < NOW()")) {
        if ($resultSelect->num_rows == 1) {
            $sqlNotifyUpdate = "UPDATE broadcast_notification SET notify='0', mark_as_read='0' where user_id=$userId AND broadcast_id=$broadcastId";
            $result = mysqli_query($conn, $sqlNotifyUpdate);
        } else {
        }
    }

} else {
    if (isset($_GET['category'])) {
        $viewingCategory = TRUE;
        $categoryId = (int) mysqli_real_escape_string($conn, $_GET['category']);
        $sql = 'SELECT b.id, b.title, b.description, b.image_url, b.category_id, c.name as category, b.location, b.gender_representation, b.starts_at, b.ends_at FROM broadcast b INNER JOIN category c on b.category_id = c.id where b.category_id=' . $categoryId . ';';
        $sqlCategoryThumbnail = 'SELECT img_url as category_thumbnail from category WHERE id=' . $categoryId;
        if ($result = $conn->query($sqlCategoryThumbnail)) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $categoryThumbnail = $row['category_thumbnail'];
            }
        }
    } else {
        $sql = 'SELECT b.id, b.title, b.description,  b.image_url,b.category_id, c.name as category, b.location, b.gender_representation, b.starts_at, b.ends_at FROM broadcast b INNER JOIN category c on b.category_id = c.id;';
    }
    $viewingBroadcasts = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fun Olympics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="/pd-finalProject/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/slick.css" />
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css" />
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .slider {
            width: 100%;
            margin: 20px auto;
        }

        .slider a:hover {
            transform: scale(1.05);
        }

        .slick-slide {
            margin: 0px 20px;

        }

        .slick-slide img {
            width: 100%;
            border-top-left-radius: 9px;
            border-top-right-radius: 9px;
            height: 150px;
            object-fit: cover;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-slide {
            transition: all ease-in-out 0.3s;
            opacity: 1;
        }

        .slick-active {
            opacity: 1;
        }

        .slick-current {
            opacity: 1;
        }

        /* a .back:hover {
            background-color: white;
            color: #21326d;
        } */
    </style>
</head>

<body>
    <?php require "../component/header.php" ?>


    <div class="contain-main">

        <div class="box">
            <div>
                <?php
                if ($viewingBroadcasts) {

                    // echo '<div class="contain-title" style="padding-bottom: 24px;">';
                    // echo '<h1>Broadcasts</h1>';
                    // echo '</div>';
                    // echo '<div class="grid-container" style="display: grid; grid-template-columns: 1fr 1fr ; gap: 60px;">';
                    // if ($result = $conn->query($sql)) {
                    //     if ($result->num_rows > 0) {
                    //         while ($row = $result->fetch_assoc()) {
                    //             $status = getStatus($row['starts_at'], $row['ends_at']);
                    //             $broadcastId = (int) $row['id'];
                    //             if (isset($_SESSION["SESSION_ID"])) {
                
                    //                 $query = "SELECT * from broadcast_notification where broadcast_id=" . $broadcastId . " and user_id=" . $userId . ";";
                    //                 $checked;
                
                    //                 if ($r = $conn->query($query)) {
                    //                     if ($r->num_rows > 0) {
                    //                         $ro = $r->fetch_assoc();
                    //                         $checked = $ro['notify'] === '1' ? TRUE : FALSE;
                    //                     } else {
                    //                         $checked = FALSE;
                    //                     }
                    //                 }
                    //             }
                
                    //             echo '<div style="padding: 24px; border-radius: 12px; border: 2px solid rgba(0, 0, 0, 0.2);max-height: 400px; overflow: hidden; box-shadow: 4px 4px 6px 0px #888888;">';
                    //             echo '<h3 style="padding-bottom: 12px;">' . $row['title'] . '</h3>';
                    //             echo '<h4>Description</h4>';
                    //             echo '<p style="max-height: 72px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;-webkit-line-clamp: 3;">' . $row['description'] . '</p>';
                    //             echo '<h4 style="padding-top: 12px;">Status</h4>';
                    //             echo '<h5 style="padding-top: 6px">Starts at</h5>';
                    //             echo '<p>' . $row['starts_at'] . '</p>';
                    //             echo '<h5 style="padding-top: 6px;">Ends at</h5>';
                    //             echo '<p>' . $row['ends_at'] . '</p>';
                    //             echo '<div style="margin-top: 12px; font-weight: bold; border: 1px solid #21326d; display: inline-block; padding: 6px 12px; border-radius: 8px;">' . $status . '</div>';
                    //             echo '<div style="display: flex; justify-content: flex-end;">';
                
                    //             if ($status == 'NOT YET AIRED') {
                    //                 if (isset($_SESSION["SESSION_ID"])) {
                    //                     echo '<label role="button" style="display: flex; align-items: center; gap: 6px; margin-top: 12px; cursor: pointer;">';
                    //                     echo '<input type="checkbox" ';
                    //                     echo $checked ? 'checked' : "";
                    //                     echo ' data-broadcast-id="' . $row['id'] . '" onclick="check(this);" value="' . $row['id'] . '" />';
                    //                     echo 'Get Notified?';
                    //                     echo '</label>';
                    //                 }
                    //             } else {
                    //                 echo '<a href="/pd-finalProject/home?broadcast=' . $row['id'] . '" style="padding: 10px 14px; border-radius: 6px; background-color: #21326d; border: none; color: white; font-weight: bold; cursor: pointer;">VIEW BROADCAST</a>';
                    //             }
                    //             echo '</div>';
                    //             echo '</div>';
                    //         }
                    //     } else {
                    //         echo "<p style='font-size: 18px;'>Broadcast with such category not found</p>";
                    //     }
                    // }
                    // echo "</div>";
                
                    echo '<div class="bg">';
                    echo '<img width="100%" height="400px" style="object-fit:cover; border-bottom-left-radius:35%; border-bottom-right-radius:35%;" src="';
                    if ($categoryThumbnail == null) {
                        echo "/pd-finalProject/images/bg1.jpg";
                    } else {
                        echo "$categoryThumbnail";
                    }
                    echo '"alt="">';
                    echo '</div>';

                    $broadcasts = array();
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                array_push($broadcasts, $row);
                            }
                        }
                    }


                    $firstTen = array_slice($broadcasts, 0, 10);

                    $remaining = array_slice($broadcasts, 10);


                    if ($viewingCategory) {

                        if ($result = $conn->query($sql)) {
                            if ($result->num_rows > 0) {

                                echo '<h2 style="margin-top: 0px; margin-left:20px;"> Live</h2>';
                                echo '<section class="regular slider">';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<a style="background-color: #FFFDD0;" href="/pd-finalProject/home?broadcast=' . $row['id'] . '">';
                                    echo '<img height="100px" src="' . $row['image_url'] . '" />';
                                    echo '<p>' . $row['title'] . '</p>';
                                    echo '</a>';


                                }
                                echo '</section>';

                            } else {
                                echo '<p style="font-size:30px; text-align:Center; Padding-top:30px;"> Sorry!! No Broadcasts Are Available Right Now. </p>';
                            }
                        }

                    } else {

                        echo '<h2 style="margin-top: 0px; margin-left:20px;"> Live Match </h2>';
                        echo '<section class="regular slider">';
                        foreach ($firstTen as $row) {
                            echo '<a style="background-color: #FFFDD0" href="/pd-finalProject/home?broadcast=' . $row['id'] . '">';
                            echo '<img src="' . $row['image_url'] . '" />';
                            echo '<p style="background: #a6a8b0; padding:5px;">' . $row['title'] . '</p>';
                            echo '</a>';
                        }
                        echo '</section>';

                        echo '<h2 style="margin-top: 0px; margin-left:20px;"> Also Live </h2>';
                        echo '<section class="regular slider">';
                        foreach ($remaining as $row) {
                            echo '<a style="background-color: #FFFDD0" href="/pd-finalProject/home?broadcast=' . $row['id'] . '">';
                            echo '<img src="' . $row['image_url'] . '" />';
                            echo '<p style="background: #a6a8b0; padding:5px;">' . $row['title'] . '</p>';
                            echo '</a>';
                        }
                        echo '</section>';
                    }


                } else {
                    // Single Broadcast
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            echo "<div>";
                            echo '<a class="back" href="./index.php" style="border:2px solid #21326d; padding:8px 5px; background: #21326d; color:white;  font-size: 20px;"> <i class="fas fa-arrow-left"></i>
                            Back</a>';
                            echo '<h1 style="padding-bottom: 24px; padding-top:20px;">' . $row['title'] . '</h1>';
                            echo '<h3 style="padding-bottom: 8px; font-size:20px; font-weight: bold;">Live Broadcast</h3>';
                            echo "<div style='display:flex;'>";
                            echo '<div style="flex: 9; position:relative;height:500px;overflow:hidden;"> <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" frameborder="0" type="text/html" src="' . $row['url'] . '" width="100%" height="100%" allowfullscreen title="Dailymotion Video Player" allow="autoplay"> </iframe> </div>';
                            require './chat.php';
                            echo "</div>";
                            echo '<h3 style="padding-top: 16px;">Description</h3>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<h3 style="padding-top: 16px">Status</h3>';
                            echo '<p>' . $row['starts_at'] . ' - ' . $row['ends_at'] . '</p>';
                            echo '<div style="margin-top: 12px; font-weight: bold; border: 1px solid rgba(0, 0, 0, 0.2); display: inline-block; padding: 6px 12px; border-radius: 8px;">LIVE</div>';
                            echo '</div>';
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <?php require "../component/footer.php" ?>
    <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script>
        function check(cb) {
            const broadcastId = cb.getAttribute("data-broadcast-id");
            if ($(cb).is(":checked")) {
                $.getScript('./actions/checkCheckbox.php?broadcast=' + broadcastId);
            } else {
                $.getScript('./actions/uncheckCheckbox.php?broadcast=' + broadcastId);
            }
        }
    </script>
    <script src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/chat.js"></script>
    <script src="js/signup.js"></script>
    <script src="js/contentmenu.js"></script>
    <script>
        window.onload = function () {
            console.log('loaded');
            var usernameInput = document.getElementById('username');
            var submitButton = document.getElementById('btn-submit');

            // Retrieve value from cookie with key "userName"
            var userNameCookie = $.cookie('userName');

            if (userNameCookie) {
                // Add value to the input field
                usernameInput.value = userNameCookie;

                // Simulate a click event on the button
                submitButton.click();
            }
        };
    </script>
    <script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on("ready", function () {
            $(".regular").slick({
                dots: true,
                infinite: false,
                slidesToShow: 5,
                slidesToScroll: 3,
            });
        });
    </script>

</body>

</html>