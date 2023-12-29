<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Add to Blog</title>
	<script src="openPic.js"></script>
	
</head>
<body class="HideScroll">
	<div class="layers">
    <div class="layer" id="parallax">
	
	
      <div class="parallaxLAYER" >
	  </div>
      <div class="parallaxLAYER" id="layer7"></div>
      <div class="parallaxLAYER" id="layer6"></div>
      <div class="parallaxLAYER" id="layer5"></div>
      <div class="parallaxLAYER" id="layer4"></div>
      <div class="parallaxLAYER" id="layer3"></div>
      <div class="parallaxLAYER" id="layer2"></div>
      <div class="parallaxLAYER" id="layer1"><div class="spaser"></div><div class="spaser"></div><a class="glowing-text" href="logout.php">[Exit]</a><div id="clouds"></div></div>
      <div class="parallaxLAYER" id="layer0"></div>	  
    </div>
	
	
  <div class="overflow">
	<div class="ContentContainer">
		<div class="spaser2"></div>
	<div class="spaser"></div>
    <div id="content">
        <form action="append_to_blog.php" method="post" enctype="multipart/form-data">
            <textarea name="blogInput" id="blogInput" rows="4" cols="50"></textarea><br>
			<div class="flex-container">
			<div>
			<input type="checkbox" name="styles[]" value="bold">[b] <b>Bold</b> [/b]<br>
			</div>
			<div>
			<input type="checkbox" name="styles[]" value="italic">[i] <i>Italic</i> [/i]<br>
			</div>
			<div>
			<input type="checkbox" name="styles[]" value="underline">[u] <u>Underline</u> [/u]<br>
			</div>
			<div>
			<input type="checkbox" name="styles[]" value="strikethrough">[s] <s>Strikethrough</s> [/s]<br>
			</div>
			<div>
			<input type="checkbox" name="styles[]" value="glowing">[g] <glow>Glowing</glow> [/g]<br>
			</div>
			<div>
			<label for="fontSize">Font Size:</label>
			<input type="number" name="fontSize" id="fontSize" min="1" max="200" value="16" style="max-width: 35px;"><br>
			</div>
            </div>
			<div class="spaser"></div>
			<div class="flex-container">
			<div>
            <label for="blogImage" class="custom-file-upload">[Upload image]</label>
            <input type="file" name="blogImage" id="blogImage" accept="image/png, image/jpeg, image/gif"><br>
			</div>
			<div>
			<label for="blogAudio" class="custom-file-upload">[Upload audio]</label>
			<input type="file" name="blogAudio" id="blogAudio" accept="audio/mp3, audio/ogg"><br>
			</div>
			<div>
			<label for="blogVideo" class="custom-file-upload">[Upload video]</label>
            <input type="file" name="blogVideo" id="blogVideo" accept="video/mp4, video/webm, video/ogg"><br>
			</div>
			</div>
			<div class="spaser"></div>
			<div class="flex-container">
            <input type="submit" class="glow" value="Publish">
			</div>		
        </form>
        <?php
            // Display the content of the blog.txt file
            if(file_exists('blog.txt')) {
                echo file_get_contents('blog.txt');
            }
        ?>
    </div>
	
	</div>
	
  </div>
</div>
	<div id="imageModal" class="modal">
        <img src="" alt="Large View">
    </div>
  </body>






