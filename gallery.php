<?php

session_start();
include './config.php' ?>

<?php include './config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gallery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      text-transform: capitalize;
      transition: all 0.3s cubic-bezier(0.34, 1.13, 0.64, 1.3);
    }

    body {
      overflow-x: hidden;
    }



    .gallery {
      min-height: 100vh;
      background: #e5e5e5;
      padding-bottom: 100px;
    }

    .gallery .controls {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      padding: 24px 0px;
      list-style: none;
    }

    .gallery .controls .buttons {
      height: 40px;
      width: 140px;
      background: #fff;
      color: #666;
      font-size: 20px;
      line-height: 40px;
      cursor: pointer;
      margin: 20px;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .gallery .controls .buttons.active {
      background: crimson;
      color: #fff;
    }

    .gallery .image-container .image {
      height: 350px;
      width: 90%;
      overflow: hidden;
      border: 14px solid #fff;
      box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3);
      margin: 20px;
    }

    .image-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin: 0 10%;
      justify-content: center;
    }

    img {
      max-width: 100%;
      object-fit: cover;
      min-height: 100%;
      object-position: center;
    }

    .btn {
      border: 2px solid blue;
      margin-top: 0px;
      background: #eee;
      width: 40px;
      text-decoration: none;
      background-color: #fff;
      color: #666;
    }

    .image:hover {
      transform: scale(1.05);
    }
  </style>
</head>

<body>
  <?php include './component/header.php' ?>

  <div class="gallery">

    <ul class="controls">
      <li class="buttons active" data-filter="all">All</li>
      <li class="buttons" data-filter="football">Football</li>
      <li class="buttons" data-filter="volleyball">Volleyball</li>
      <li class="buttons" data-filter="tenis">Tennis</li>
      <li class="buttons" data-filter="martialarts">Martial Arts</li>
      <li class="buttons" data-filter="indoorgames">Indoor Games</li>
      <li class="buttons" data-filter="golf">Golf</li>
    </ul>

    <div class="image-container" style="display: grid; grid-template-columns: 1fr 1fr">
      <a href="./images/football.jpg" class="image football">
        <img src="./images/football.jpg" alt="" />
      </a>
      <a href="./images/football1.jpg" class="image football">
        <img src="./images/football1.jpg" alt="" />
      </a>
      <a href="./images/football2.jpg" class="image football">
        <img src="./images/football2.jpg" alt="" />
      </a>
      <a href="./images/football3.jpg" class="image football">
        <img src="./images/football3.jpg" alt="" />
      </a>

      <a href="./images/volleyball.jpg" class="image volleyball">
        <img src="./images/volleyball.jpg" alt="" />
      </a>
      <a href="./images/volleyball1.jpg" class="image volleyball">
        <img src="./images/volleyball1.jpg" alt="" />
      </a>
      <a href="./images/volleyball2.jpg" class="image volleyball">
        <img src="./images/volleyball2.jpg" alt="" />
      </a>
      <a href="./images/volleyball3.jpg" class="image volleyball">
        <img src="./images/volleyball3.jpg" alt="" />
      </a>

      <a href="./images/tenis.jpg" class="image tenis">
        <img src="./images/tenis.jpg" alt="" />
      </a>
      <a href="./images/tenis1.jpg" class="image tenis">
        <img src="./images/tenis1.jpg" alt="" />
      </a>
      <a href="./images/tenis2.jpg" class="image tenis">
        <img src="./images/tenis2.jpg" alt="" />
      </a>
      <a href="./images/tenis3.jpg" class="image tenis">
        <img src="./images/tenis3.jpg" alt="" />
      </a>

      <a href="./images/martial.jpg" class="image martialarts">
        <img src="./images/martial.jpg" alt="" />
      </a>
      <a href="./images/martial1.jpg" class="image martialarts">
        <img src="./images/martial1.jpg" alt="" />
      </a>
      <a href="./images/martial2.jpg" class="image martialarts">
        <img src="./images/martial2.jpg" alt="" />
      </a>
      <a href="./images/martial3.jpg" class="image martialarts">
        <img src="./images/martial3.jpg" alt="" />
      </a>
      <a href="./images/martial4.jpg" class="image martialarts">
        <img src="./images/martial4.jpg" alt="" />
      </a>

      <a href="./images/indoor.jpg" class="image indoorgames">
        <img src="./images/indoor.jpg" alt="" />
      </a>
      <a href="./images/indoor1.jpg" class="image indoorgames">
        <img src="./images/indoor1.jpg" alt="" />
      </a>
      <a href="./images/indoor2.jpg" class="image indoorgames">
        <img src="./images/indoor2.jpg" alt="" />
      </a>
      <a href="./images/indoor3.jpg" class="image indoorgames">
        <img src="./images/indoor3.jpg" alt="" />
      </a>

      <a href="./images/golf.png" class="image golf">
        <img src="./images/golf.png" alt="" />
      </a>
      <a href="./images/golf1.png" class="image golf">
        <img src="./images/golf1.png" alt="" />
      </a>
      <a href="./images/golf2.png" class="image golf">
        <img src="./images/golf2.png" alt="" />
      </a>
      <a href="./images/golf3.png" class="image golf">
        <img src="./images/golf3.png" alt="" />
      </a>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

  <script>
    $(document).ready(function () {
      $(".buttons").click(function () {
        $(this).addClass("active").siblings().removeClass("active");

        var filter = $(this).attr("data-filter");

        if (filter == "all") {
          $(".image").show(400);
        } else {
          $(".image")
            .not("." + filter)
            .hide(200);
          $(".image")
            .filter("." + filter)
            .show(400);
        }
      });

      $(".gallery").magnificPopup({
        delegate: "a",
        type: "image",
        gallery: {
          enabled: true,
        },
      });
    });
  </script>
</body>
<footer>
  <?php include './component/footer.php' ?>
</footer>

</html>