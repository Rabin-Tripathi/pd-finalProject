<?php include './config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Fun Olympics</title>
  <link rel="stylesheet" href="./css/landing.css" />
  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <div class="pattern"></div>
    <div class="logo">
      <img height="120px" src="images/img2.png" alt="">
    </div>
  </div>

  <div class="box-1 box"></div>
  <div class="box-2 box"></div>
  <div class="box-3 box"></div>

  <div class="title-2">Olympics</div>

  <div class="title-1">Fun</div>

  <div class="content">
    <p>
      Welcome to the official website of the FunOlympic Games 2023 in Yokyo!
      where you can experience live broadcasts like never before. Tune in to
      our high-quality live streams and be a part of the action. Whether
      you're a sports enthusiast looking to watch your favorite teams
      compete in real-time, a music lover eager to enjoy live performances
      from top artists and bands, or someone interested in captivating talk
      shows and interviews with your favorite personalities, we've got you
      covered. Our platform offers a seamless and immersive experience,
      bringing the excitement of live events right to your screen. Join us
      now and indulge in the thrill of live broadcasting.
    </p>

    <a href="./home"><button style="font-size: 12px; font-family:sans-serif; font-weight:bold;"> Watch Now </button></a>
  </div>

  <div class="media">
    <ul>
      <a href="https://www.facebook.com/">
        <li><ion-icon name="logo-facebook"></ion-icon></li>
      </a>
      <a href="https://www.instagram.com/">
        <li><ion-icon name="logo-instagram"></ion-icon></li>
      </a>
      <a href="https://www.twitter.com/">
        <li><ion-icon name="logo-twitter"></ion-icon></li>
      </a>
      <a href="https://www.youtube.com/">
        <li><ion-icon name="logo-youtube"></ion-icon></li>
      </a>
    </ul>
  </div>
  </div>

  <script type="text/javascript">
    TweenMax.to(".title-1", 2, {
      x: 30,
      opacity: 1,
      ease: Expo.easeInOut,
    });

    TweenMax.to(".title-2", 2, {
      delay: 0.2,
      x: -80,
      opacity: 1,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".runner", 2, {
      delay: 1.6,
      x: -80,
      opacity: 0,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".box-1", 4, {
      delay: 1,
      rotation: 200,
      transformOrigin: "50% 50%",
      opacity: 0,
      x: -180,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".box-2", 4, {
      delay: 1.2,
      rotation: 90,
      transformOrigin: "50% 50%",
      opacity: 0,
      x: -180,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".box-3", 4, {
      delay: 1,
      rotation: 180,
      transformOrigin: "50% 50%",
      opacity: 0,
      x: -180,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".pattern", 2, {
      delay: 0.8,
      width: 0,
      opacity: 0,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".logo", 2, {
      delay: 1.2,
      y: 10,
      opacity: 0,
      ease: Expo.easeInOut,
    });

    TweenMax.staggerFrom(
      ".menu ul li",
      2,
      {
        delay: 1.6,
        y: 20,
        opacity: 0,
        ease: Expo.easeInOut,
      },
      0.1
    );

    TweenMax.staggerFrom(
      ".media ul li",
      2,
      {
        delay: 2,
        y: 20,
        opacity: 0,
        ease: Expo.easeInOut,
      },
      0.1
    );

    TweenMax.from(".content p", 2, {
      delay: 2.4,
      y: 20,
      opacity: 0,
      ease: Expo.easeInOut,
    });

    TweenMax.from(".content button", 2, {
      delay: 2.6,
      y: 20,
      opacity: 0,
      ease: Expo.easeInOut,
    });
  </script>
</body>

</html>