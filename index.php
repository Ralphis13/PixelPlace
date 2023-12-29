<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="style2.css">
	<title>Pixel Place</title>
	<script src="openPic.js"></script>
</head>
  <body class="HideScroll">
	<div class="layers">
    <div class="layer" id="parallax">
      <div class="parallaxLAYER" ></div>
      <div class="parallaxLAYER" id="layer7"></div>
      <div class="parallaxLAYER" id="layer6"></div>
      <div class="parallaxLAYER" id="layer5"></div>
      <div class="parallaxLAYER" id="layer4"></div>
      <div class="parallaxLAYER" id="layer3"></div>
      <div class="parallaxLAYER" id="layer2"></div>
      <div class="parallaxLAYER" id="layer1"><div class="spaser"></div><div class="spaser"></div><a class="glowing-text" href="admin.html">[Log In]</a><div id="clouds"></div></div>
      <div class="parallaxLAYER" id="layer0"></div>
    </div>
  <div class="overflow">
	<div class="ContentContainer">
		<div class="spaser2"></div>
		<?php
            // Display the content of the blog.txt file
            if(file_exists('blog.txt')) {
                echo file_get_contents('blog.txt');
            }
        ?>
	</div>
  </div>
</div>
	<div id="imageModal" class="modal">
        <img src="" alt="Large View">
    </div>
  </body>
</html>