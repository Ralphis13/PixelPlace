<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$styleMapping = [
		"bold" => "strong",
		"italic" => "em",
		"underline" => "u",
		"strikethrough" => "s",
		"glowing" => "glow"
	];

    if ((isset($_POST["blogInput"]) && !empty(trim($_POST["blogInput"]))) || isset($_FILES["blogImage"]) || isset($_FILES["blogAudio"])) {
        $blogInput = trim($_POST["blogInput"]) . "\n";
        $imageName = "";
        $audioName = "";
        $videoName = "";
		
			 if (isset($_FILES["blogImage"]) && $_FILES["blogImage"]["error"] == 0){
			$allowed_image_formats = ['image/png', 'image/jpeg', 'image/gif'];

			if (in_array($_FILES["blogImage"]["type"], $allowed_image_formats)) {
				$target_dir = "uploads/";
				$imageName = basename($_FILES["blogImage"]["name"]);
				$target_file = $target_dir . $imageName;

				if (!file_exists($target_file)) {
					move_uploaded_file($_FILES["blogImage"]["tmp_name"], $target_file);
				}
			}
		}

        if (isset($_FILES["blogAudio"]) && $_FILES["blogAudio"]["error"] == 0){
            $target_dir = "uploads/";
            $audioName = basename($_FILES["blogAudio"]["name"]);
            $target_file = $target_dir . $audioName;

            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["blogAudio"]["tmp_name"], $target_file);
            }
        }
		// Video upload logic
		if (isset($_FILES["blogVideo"]) && $_FILES["blogVideo"]["error"] == 0 && in_array($_FILES["blogVideo"]["type"], ['video/mp4', 'video/webm', 'video/ogg'])) {
			$target_dir = "uploads/";
			$videoName = basename($_FILES["blogVideo"]["name"]);
			$target_file = $target_dir . $videoName;

			if (!file_exists($target_file)) {
				move_uploaded_file($_FILES["blogVideo"]["tmp_name"], $target_file);
			}
		}
		
        $styleTag = $styleMapping[$_POST['style']] ?? "";
		$blogInput = trim($_POST["blogInput"]) . "\n";

		// Определение пользовательских тегов и их замен в HTML
		$blogInput = trim($_POST["blogInput"]) . "\n";

		// Определение пользовательских тегов и их замен в HTML
		$bbcode = array("[b]", "[/b]", "[i]", "[/i]", "[u]", "[/u]", "[s]", "[/s]", "[g]", "[/g]");
		$htmlcode = array("<strong>", "</strong>", "<em>", "</em>", "<u>", "</u>", "<s>", "</s>", "<span class='glow'>", "</span>");

		$blogInput = str_replace($bbcode, $htmlcode, $blogInput);

				
		// Check if styles are set and is an array
		if (isset($_POST["styles"]) && is_array($_POST["styles"])) {
			// Loop through the selected styles and wrap the text accordingly
			foreach ($_POST["styles"] as $style) {
				$styleTag = $styleMapping[$style] ?? "";
				if ($styleTag) {
					$blogInput = "<$styleTag>$blogInput</$styleTag>";
				}
			}
		}

		// Check if fontSize is set and is a valid number
		if (isset($_POST["fontSize"]) && is_numeric($_POST["fontSize"])) {
			$fontSize = intval($_POST["fontSize"]);
			$blogInput = "<!-- TEXT... -->\n<span style=\"font-size:{$fontSize}px;\">$blogInput</span>\n<!-- ...TEXT -->\n";
		}

		$blogEntry = $blogInput;
        // Далее заносим команды в текстовой файл
        if ($imageName) {//Добавляем картинку
		    $blogEntry .= "<!-- IMAGE... -->\n";
            $blogEntry .= "<br><br><img src='uploads/$imageName' alt='blog image'>\n";
			$blogEntry .= "<!-- ...IMAGE -->\n";
        }
        
        if ($audioName) { //Добавляем аудио
		$uniquePlayerId = 'player' . md5($audioName); // Создаем уникальный ID

		$blogEntry .= "<!-- AUDIO... -->\n";
		$blogEntry .= "<audio id='$uniquePlayerId' src='uploads/$audioName' type='audio/mpeg'></audio>\n";
		$blogEntry .= "<div class='audio_div'>\n";
		$blogEntry .= "<button class='custom-file-upload' onclick='document.getElementById(\"$uniquePlayerId\").play()'>[Play]</button>\n"; 
		$blogEntry .= "<button class='custom-file-upload' onclick='document.getElementById(\"$uniquePlayerId\").pause()'>[Pause]</button>\n"; 
		$blogEntry .= "<div style='height: 5px;'></div>\n";
		$blogEntry .= "<div class='glowing-text'>[$audioName]</div>\n";
		$blogEntry .= "</div>\n";
		$blogEntry .= "<!-- ...AUDIO -->\n";
		}
        $blogEntry .= $videoName ? "<!-- VIDEO... -->\n<video controls><source src='uploads/$videoName' type='video/mp4'>Your browser does not support the video tag.</video>\n<!-- ...VIDEO -->\n" : "";
		
        $blogEntry .= "<br><br>";//Отступаем две строки

        $existingContent = file_exists('blog.txt') ? file_get_contents('blog.txt') : "";
        file_put_contents('blog.txt', $blogEntry . $existingContent);

        header("Location: create.php");
        exit;
    } else {
        header("Location: error.php");
        exit;
    }
}
?>

