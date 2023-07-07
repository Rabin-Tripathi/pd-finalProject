<?php
function active($page)
{
  $url_array = explode('/', $_SERVER['REQUEST_URI']);
  $url = end($url_array);
  if ($page == $url) {
    return TRUE;
  }
  return FALSE;
}

function activeLinkContains($keyword)
{
  if (strpos($_SERVER['REQUEST_URI'], $keyword) !== false) {
    return TRUE;
  }
  return FALSE;
}
?>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/pd-finalProject/config.php";

$query = "SELECT * FROM category";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<style>
  .navigate {
    background-color: #21326d;
    padding: 0px;
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    font-family: sans-serif;
    text-align: center;
  }

  .navigate ul {
    display: flex;
    flex-direction: row;
    /* align-items: center; */
  }

  .navigate li {
    display: flex;
    align-items: center;
    font-size: 18px;
    padding: 0 20px;

  }

  .navigate li a {
    text-decoration: none;
    color: #fff;
  }

  .navigate li a:hover {
    color: #ff6262;
  }

  .navigate img {
    padding: 0 22px;
    height: 50px;
  }

  /* Dropdown Button */
  .dropbtn,
  .dropbtn1 {
    background-color: #4458a8;
    color: white;
    padding: 10px;
    font-size: 18px;
    border: none;
    cursor: pointer;
  }

  /* Dropdown button on hover & focus */
  .dropbtn:hover,
  .dropbtn:focus,
  .dropbtn1:hover,
  .dropbtn1:focus {
    /* background-color: #21326d; */
    color: #ff6262;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    padding-left: 20px;
  }

  .dropdown-content,
  .dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a,
  .dropdown-content1 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover,
  .dropdown-content1 a:hover {
    background-color: #ddd;
  }

  .show {
    display: block;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navigate">
  <div>
    <ul style="style='padding: 0px; margin-bottom: 0px;">
      <li><img height="35px" src="/pd-finalProject/images/img2.png" alt="" /><a style="<?php if (activeLinkContains('home'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/home">Home</a></li>
        <li><a style="<?php if (active('gallery.php'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/gallery.php">Gallery</a></li>
        <li><a style="<?php if (activeLinkContains('nav-news'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/nav-news">News</a></li>
        <li><a style="<?php if (active('contact_us.php'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/contact_us.php">Contact</a></li>
        <li><a style="<?php if (active('about_us.php'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/about_us.php">About</a></li>

        <?php
      if (isset($_SESSION['SESSION_ID'])) {
        $notificationPath = $_SERVER['DOCUMENT_ROOT'];
        $notificationPath .= '/pd-finalProject/notify.php';
        echo '<li style="position: absolute; right: 120px; padding-top: 15px;">';
        include $notificationPath;
        echo '</li>';
      }
      ?>


      <?php
      $sessionEmail = isset($_SESSION['SESSION_EMAIL']) ? $_SESSION['SESSION_EMAIL'] : FALSE;

      $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$sessionEmail}'");

      if (mysqli_num_rows($query) == 1) {
        echo '<li style="position: absolute; right: 32px; padding-top: 14px;"><a href="/pd-finalProject/logout.php" class="login" onclick="return confirmLogout()">Logout<i class="fas fa-sign-out" style="font-size:15px; padding-left: 15px; "></a></li></i>';
      } else {
        echo '<li style="position: absolute; right: 32px; padding-top: 14px;"><a href="/pd-finalProject/login.php" class="login">Login<i class="fas fa-sign-in" style="padding-left: 15px;"></a></li></i>';
      }
      ?>

      <script>
        function confirmLogout() {
          return confirm("Are you sure you want to logout?");
        }
      </script>

    </ul>
  </div>


  <div style='background-color: #4458a8; min-width: 100%; padding: 0px; display: flex;'>
    <ul style='padding: 0px; margin: 0px;'>
      <li style="padding-left:121px;">
        <i class="fa fa-play" style="color:white; padding-right:18px;"></i>
        <a href="/pd-finalProject/home/index.php">
          <h2 style="color:white; font-size: 18px;">Watch </h2>
        </a>
        <h3 style="color:white; margin-left:10px; align-items:center; text-align: center;"> | </h3>
      </li>
      <li><a style="<?php if (active('schedule.php'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/schedule.php">Schedule</a></li>
        <li><a style="<?php if (active('results.php'))
        echo "color: #ff6262; font-weight:bold;" ?>" href="/pd-finalProject/results.php">Results</a></li>

        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"
            style="font-size:18px; font-family:sans-serif;">Categories&nbsp;<i class="fa fa-caret-down"></i></button>
          <div id="myDropdown" class="dropdown-content">

            <?php
      foreach ($options as $option) {
        echo "<a style='";
        if (activeLinkContains("category=" . (int) $option['id']))
          echo "color: #ff6262; font-weight:bold; ";
        echo "' href='/pd-finalProject/home?category={$option['id']}'>{$option['name']}</a>";
      }
      ?>
        </div>
      </div>


      <?php
      if (isset($_SESSION['SESSION_ADMIN'])) {
        if ($_SESSION['SESSION_ADMIN'] == TRUE) {

          echo '<div class="dropdown">';
          echo '<button onclick="myFunction1()" class="dropbtn1" style="font-size:18px; font-family:sans-serif; margin-left: 10px;;">Admin
        Panel&nbsp;<i class="fa fa-caret-down"></i></button>';
          echo '<div id="myDropdown1" class="dropdown-content1">';

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
          echo '</div>';
          echo '</div>';
        }
      }
      ?>
    </ul>
  </div>
</nav>
</div>

<script>

  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>

<script>

  function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn1')) {
      var dropdowns = document.getElementsByClassName("dropdown-content1");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>