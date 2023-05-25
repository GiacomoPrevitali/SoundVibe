<?php 
session_start();

if (isset($_POST['submit']) && isset($_FILES['my_audio'])) {
	
    $sname = "localhost";
    $uname = "SoundVibe_User";
    $password = "1234";
    $db_name = "soundvibe";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

    $audio_name = $_FILES['my_audio']['name'];
    $tmp_name = $_FILES['my_audio']['tmp_name'];
    $error = $_FILES['my_audio']['error'];

    if ($error === 0) {
    	$audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

    	$audio_ex_lc = strtolower($audio_ex);

    	$allowed_exs = array("3gp", 'mp3', 'm4a', 'wav', 'm3u','ogg');

    	if (in_array($audio_ex_lc, $allowed_exs)) {
    		
  //  		$new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
            $new_audio_name = uniqid("audio-", true). '.'.$audio_name;

    		$audio_upload_path = 'Database/Audio/'.$new_audio_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

    		// Now let's Insert the video path into database
            $sql = "INSERT INTO song(audio_url) 
                   VALUES('$new_audio_name')";
            mysqli_query($conn, $sql);

            $sql='SELECT Id FROM Song WHERE audio_url="'.$new_audio_name.'"';
            $result =$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $_SESSION['IdSong']=$row['Id'];
                    //header("Location: admin.php?error=$new_audio_name");
              }     
            }
            //header("Location: admin.php?error=$new_audio_name");
    	}else {
    		$em = "You can't upload files of this type";
    		//header("Location: index.php?error=$em");
    	}
    }

   // $conn->close();
}


if (isset($_FILES['my_image'])) {
	
    $sname = "localhost";
    $uname = "SoundVibe_User";
    $password = "1234";
    $db_name = "soundvibe";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

	//echo "<pre>";
	//print_r($_FILES['my_image']);
	//echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				//$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $new_img_name = uniqid("IMG-", true).'.'.$img_name;
				$img_upload_path = 'Database/Foto/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				//echo $new_img_name;
				// Insert into Database
				$sql='UPDATE song SET Immagine = "'.$new_img_name.'" WHERE Id = "'.$_SESSION['IdSong'].'"';
				mysqli_query($conn, $sql);
				//header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		       // header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
	//	header("Location: index.php?error=$em");
	}

}



if(isset($_POST['TitoloS'])){

    $sname = "localhost";
    $uname = "SoundVibe_User";
    $password = "1234";
    $db_name = "soundvibe";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    if (!$conn) {
        echo "Connection failed!";
        exit();
    }

    $sql='UPDATE song SET Titolo = "'.$_POST['TitoloS'].'", Artista = "'.$_POST['ArtistaS'].'", Album = "'.$_POST['AlbumS'].'", Durata = "'.$_POST['DurataS'].'", Data_Aggiunta = "'.$_POST['DataS'].'" WHERE Id = "'.$_SESSION['IdSong'].'"';
    $result =$conn->query($sql);
}

?>

<!DOCTYPE html>
<head>
<title>New Playlist</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="styleNew.css" />
        <!--<script type="text/javascript" src="script.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		input {
			font-size: 2rem;
		}
		a {
			text-decoration: none;
			color: #006CFF;
			font-size: 1.5rem;
		}
	</style>
  
</head> 
<body onload="getTokenFromLocalStorage();">
<!-- modifica, elimina, scarica pdf -->
   <div class="sidebar">
        <div class="logo">
            <a href="#">
            <img src="./Foto/SoundVibe_Logo.png" alt="Logo" />
            </a>
        </div>
            <a href="destroy.php">
            <h4 class="link logout" onclick="removeTokenFromLocalStorage();">Logout</h4>
            </a>
      </div>

     
    </div>
        
    <div class="main-container">
    <?php
     if(isset($_SESSION['IdSong'])){
    echo '<h3 class="Name" hidden> Id: '. $_SESSION['IdSong'].'</h3>';}?>
      <div class="Upload-audio"></div>
      <form 
           action="admin.php"
	       method="post"
	       enctype="multipart/form-data">

	 	<input type="file"
	 	       name="my_audio">

	 	<input type="submit"
	 	       name="submit" 
	 	       value="Upload">
	 </form>

     <form 
           action="admin.php"
	       method="post"
	       enctype="multipart/form-data">

	 	<input type="file"
	 	       name="my_image">

	 	<input type="submit"
	 	       name="submit" 
	 	       value="Carica Foto">
	 </form>

    <form action="admin.php"
	       method="post">
        <input type="text" id="TitoloS" name="TitoloS" placeholder="Titolo"     required>
        <input type="text" id="ArtistaS" name="ArtistaS" placeholder="Artista"  required>
        <input type="text" id="AlbumS" name="AlbumS" placeholder="Album"        required>
        <input type="time" id="DurataS" name="DurataS" placeholder="Durata"     required>
        <input type="date" id="DataS" name="DataS" placeholder="Data"           required><br>
        <input type="submit" value="Carica"> 
    </form>
  

      <script type="text/javascript" src="script.js"></script>
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
  </body>
</body>
</html>

