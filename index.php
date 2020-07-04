<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	<link rel="stylesheet" href="style-312.css">
	<title>  Diners Official – Top Clothing Brand of Pakistan &ndash; diners.com.pk</title>
</head>
<body>

<?php include 'Header.php';?>
<?php
  $image = "";
  require_once "imgconfig.php";
	$sql="SELECT * FROM mainpage LIMIT 1";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_array($result);
  $image = $row[2];
?>

<div class="slide">

</div>
<div class="section-title">
  <h2>CATEGORIES</h2>
</div>
<div class="centerss">
<div class="up-cat">
<div class="gallery">
<a  href="#">

<img src="<?php echo $image?>" alt="Formal Shirts" >
</a>

</div>

<div class="gallery">
<a href="casual.php">
  <img src="2.png" alt="Casual Shirts" >
</a>

</div>

<div class="gallery">
<a href="#">
  <img src="3.png" alt="suiting & blazers" >
</a>

</div>
</div>
<div class="down-cat">
<a href="#">
  <div class="gallery">
  <img src="4.png" alt="d juniors">
</a>

</div>
<div class="gallery">
<a href="#">
  <img src="5.png" alt="french emporio">
</a>
</div>
<div class="gallery">
<a href="#">
  <img src="6.png" alt="sohaye" >
</a>
</div>
</div>
</div>
<div class="row1 rowLine">
      <div class="">
      <div class="">
        <h4 class="newsletterTitle">Sign up for our newsletter to receive <br> special offers, news &amp; events.</h4>
        <div id="footer_signup">
            <p></p>
            <form method="post" action="" id="contact_form" class="contact-form">
            <input type="email" name="contact[email]" id="footer-EMAIL" placeholder="Enter Email Address">
            <input type="submit" id="footer-subscribe" value="Join">
          </form>
        </div>
      </div>
      </div>
  </div>
</div>
    </div>
<?php include 'Footer.php';?>

</body>
</html>
