<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/pd-finalProject/config.php";

$query = "SELECT * FROM category";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<aside style="padding: 30px 0px 0px 0px; width: 200px; font-size: 18px; font-family:sans-serif;">
    <!-- <section style="display:flex; flex-direction:column; gap:15px;">
        <p><a style="<?php if (activeLinkContains('home') and !activeLinkContains('category'))
        #  echo "color: crimson; font-weight:bold;" ?>" href="/pd-finalProject/home">Browse Broadcasts</a></p>
            <p><a style="<?php if (activeLinkContains('schedule.php'))
            #   echo "color: crimson; font-weight:bold;" ?>" href="/pd-finalProject/schedule.php">View Schedule</a></p>
            <p><a style="<?php if (activeLinkContains('results.php'))
            #    echo "color: crimson; font-weight:bold;" ?>" href="/pd-finalProject/results.php">View Results</a></p>
        </section> -->

    <?php
    if (isset($_SESSION['SESSION_ADMIN'])) {
        if ($_SESSION['SESSION_ADMIN'] == TRUE) {
            echo "<section>";
            echo '<h1 style="padding-top: 28px; padding-bottom: 12px; font-size:23px; ">Admin Section</h1>';
            echo '<p><a style="';
            if (activeLinkContains('user/'))
                echo "color: crimson; font-weight:bold;";
            echo '" href="/pd-finalProject/user/user-d.php">User Management</a></p>';
            echo '<p><a style="';
            if (activeLinkContains('broadcast/'))
                echo "color: crimson; font-weight:bold;";
            echo '" href="/pd-finalProject/broadcast/broadcast-d.php">Broadcast Management</a></p>';
            echo '<p><a style="';
            if (activeLinkContains('category/'))
                echo "color: crimson; font-weight:bold;";
            echo '" href="/pd-finalProject/category/category-d.php">Category Management</a></p>';
            echo '<p><a style="';
            if (activeLinkContains('news/'))
                echo "color: crimson; font-weight:bold;";
            echo '" href="/pd-finalProject/news/news-d.php">News Management</a></p>';
            echo '</section>';
        }
    }
    ?>

    <section>
        <h1 style="padding-top: 48px; font-family:sans-serif; font-size:24px; padding-bottom:20px">Categories</h1>
        <div style="display:flex; flex-direction:column; gap:15px;">
            <?php
            foreach ($options as $option) {
                echo "<p><a style='";
                if (activeLinkContains("category=" . (int) $option['id']))
                    echo "color: crimson; font-weight:bold; ";
                echo "' href='/pd-finalProject/home?category={$option['id']}'>{$option['name']}</a></p>";
            }
            ?>
        </div>
    </section>
</aside>