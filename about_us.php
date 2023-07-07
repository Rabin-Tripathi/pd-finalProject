<?php include './config.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        .wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .background-container {
            width: 100%;
            min-height: 81.5vh;
            display: flex;
            background-image: url("./images/abt.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            object-fit: cover;
        }

        .about-container {
            width: 50%;
            min-height: 65vh;
            position: fixed;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 24px 24px 30px #6d8dad;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            width: 50px;
            height: 50px;
            margin: 10px;
            border-radius: 10px;
        }

        .text-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            font-size: 22px;
            letter-spacing: 1px;
        }

        .text-container h1 {
            font-size: 70px;
            padding: 20px 0px;
        }

        /* .text-container a {
            text-decoration: none;
            padding: 12px;
            margin: 50px 0px;
            background-color: #2793f7;
            border: 2px solid transparent;
            color: white;
            border-radius: 5px;
            transition: .3s all ease;
        } */

        .text-container a:hover {
            background-color: #00bcd4;
            color: black;
        }

        .icon .fa {
            display: inline-flex;
            justify-content: center;
            padding: 20px 20px;
            font-size: 20px;
            width: 50px;
            text-decoration: none;
            margin-top: 70px;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-instagram {
            background: #E1306C;
            color: white;
        }

        @media screen and (max-width: 1600px) {
            .about-container {
                width: 65%;
            }

            .image-container img {
                width: 400px;
                height: 400px;
            }

            .text-container h1 {
                font-size: 50px;
            }
        }

        @media screen and (max-width: 1100px) {
            .about-container {
                flex-direction: column;
            }

            .image-container img {
                width: 100px;
                height: 100px;
            }

            .text-container {
                align-items: center;
            }
        }
    </style>

</head>

<body>
    <?php include './component/header.php' ?>
    <div class="wrapper">
        <div class="background-container"></div>
        <div class="about-container">
            <div class="image-container">
                <img src="./images/about-us.png" alt="">
            </div>
            <div class="text-container">
                <h1>About us</h1>
                <p>Welcome to our Live Broadcast Website, <br>the ultimate destination for live broadcasting
                    enthusiasts. Our platform was created with a vision to bring the excitement and thrill of live
                    events directly to your screens, allowing you to enjoy the best in sports, music, and talk shows
                    from the comfort of your own home.</p>
                <div class="icon">
                    <a href="https://www.facebook.com/">
                        <i class="fa fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/">
                        <i class="fa fa-brands fa-instagram"></i></a>
                    <a href="https://www.twitter.com/">
                        <i class="fa fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php include './component/footer.php' ?>
</footer>

</html>