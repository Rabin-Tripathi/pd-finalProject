<?php include './config.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <title>Contact Us</title>
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style_3.css">

</head>

<body>
  <?php include './component/header.php' ?>
  <section>
    <div class="section-header">
      <div class="container">
        <h2>Contact Us</h2>
        <div class="bg">
          <img width="50%" height="330px" style="object-fit:content; " src="/pd-finalProject/images/cont.png" alt="">
        </div>

        <p style="padding:40px 0px ">We value your feedback and are here to assist you with any inquiries
          or concerns you may have regarding our Live Broadcast Website.
          Our dedicated support team is committed to ensuring your
          experience on our platform is seamless and enjoyable.
          Whether you have questions about our live streaming services,
          need assistance troubleshooting technical issues,
          or simply want to provide us with feedback, we are eager to hear from you.</p>
        <br>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>

            <div class="contact-info-content">
              <h4>Address</h4>
              <p>4671 Yokyo City</p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>

            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>01-4992430</p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>

            <div class="contact-info-content">
              <h4>Email</h4>
              <p>funolympics@email.com</p>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <form action="" id="contact-form">
            <h2>Send Message</h2>
            <div class="input-box">
              <input type="text" required="true" name="">
              <span>Full Name</span>
            </div>

            <div class="input-box">
              <input type="email" required="true" name="">
              <span>Email</span>
            </div>

            <div class="input-box">
              <textarea required="true" name=""></textarea>
              <span>Type your Message...</span>
            </div>

            <div class="input-box">
              <input type="submit" value="Send" name="">
            </div>
          </form>
        </div>
      </div>
      <p style="margin: 50px auto; text-align:center;  font-size: 18px;
  letter-spacing: 1px;     margin-left: 70px;"> Feel free to reach out to us through the contact information
        provided below or by filling out the contact form.
        We strive to respond to all inquiries promptly and
        provide the necessary assistance to address your needs.
        <br>
        <br>
        Thank you for choosing our Live Broadcast Website, and we look forward to hearing from you soon.
      </p>
    </div>
  </section>
</body>
<footer>
  <?php include './component/footer.php' ?>

</footer>

</html>