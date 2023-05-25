<?php

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

echo "<pre>";
print_r($_FILES['my_image']);
echo "</pre>";
$IdPlaylist=$_POST['valorePl'];
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
      echo $new_img_name;
      // Insert into Database
      $sql='UPDATE playlist SET Immagine = "'.$new_img_name.'" WHERE Id = "'.$IdPlaylist.'"';
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

  
</head> 
<body onload="getTokenFromLocalStorage();">
<!-- modifica, elimina, scarica pdf -->
    <div class="sidebar">
      <div class="logo">
        <a href="#">
          <img src="./Foto/SoundVibe_Logo.png" alt="Logo" />
        </a>
    </div>

      <div class="navigation">
        <ul>
          <li>
            <a href="index.php">
              <span class="fa fa-home"></span>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="Search.php">
              <span class="fa fa-search "></span>
              <span>Search</span>
            </a>
          </li>

          <li>
            <a href="Library.php">
              <span class="fa fas fa-book "></span>
              <span>Your Library</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="navigation">
        <ul>
          <li>
            <a href="Library.php">
              <span class="fa fas fa-plus-square Scolor"></span>
              <span class="Scolor">Create Playlist</span>
            </a>
          </li>

          <li>
            <a href="Liked.php">
              <span class="fa fas fa-heart"></span>
              <span>Liked Songs</span>
            </a>
          </li>
        </ul>
      </div>

     
    </div>

    <div class="main-container">
      <div class="topbar">
      <div class="butLogInd">
                <a href="#">
                  <!--<button type="button" class="button1">Sign Up</button>-->
                  <h4 class="link AccountName" id="AccountName"></h4>
                </a>
             
                <a href="destroy.php">
                  <h4 class="link logout" onclick="removeTokenFromLocalStorage();">Logout</h4>
                </a>
            </div>
      </div>
      <div class="container">
      <form id="AddPlaylist" action="NewPlaylist.php" method="post">
          <label>Inserisci un titolo</label>
          <input type="text" id="TitoloPlaylist" required><br>
          <label>Inserisci una descrizione</label>
          <input type="text" id="DescrizionePlaylist" required>
          <button type="submit" id="CreaPlaylist" class="CreaPlaylist">Crea</button>
      </form>
      
      <form 
        id="AddPlaylist"
          action="NewPlaylist.php"
	       method="post"
	       enctype="multipart/form-data">
    <input id="valorePl" name="valorePl" value="" hidden> 
	 	<input type="file"
	 	       name="my_image">

	 	<input type="submit"
	 	       name="submit" 
            class="CreaPlaylist"
	 	       value="Carica Foto">
	 </form>
      </div>
      <script type="text/javascript" src="script.js"></script>
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
  </body>
</body>
</html>
