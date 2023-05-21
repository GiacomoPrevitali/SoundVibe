<!DOCTYPE html>
<head>
<title>SoundVibe</title>
<meta charset="utf-8">
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <!--<script type="text/javascript" src="script.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head> 
<body onload="LikedPage();">
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
              <span class="fa fas fa-book"></span>
              <span>Your Library</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="navigation">
        <ul>
          <li>
            <a href="NewPlaylist.php">
              <span class="fa fas fa-plus-square"></span>
              <span>Create Playlist</span>
            </a>
          </li>

          <li>
            <a href="Liked.php">
              <span class="fa fas fa-heart Scolor"></span>
              <span class="Scolor">Liked Songs</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-container">
        <div class="topbar">
            <div class="navbar">
            <div class="butLog">
                <a href="#">
                  <h4 type="button" id="AccountName" class="button1"></h4>
                 <!-- <h4 class="link AccountName"></h4>-->
                </a>

                    <h4  class="link logout" onclick="removeTokenFromLocalStorage();">Logout</h4>
                  

            </div>
            </div>
        </div>
        <div id="table-container"></div>
        <table id="table">
          <thead>
              <tr class="TitleTable bg-primary">
                <td>ID</td>
                <td>Titolo</td>
                <td>Artista</td>
                <td>Album</td>
                <td>Durata</td>
                <td>Data di Uscita</td>
                <td>Elimina</td>                  
              </tr>
          </thead>
        </table>

     
    </div>
    <audio id="SongPlay" src="Database/Audio/" class="Song" controls hidden></audio>
      <div class="Music">
      <img id="FotoSong" class="fotoSogn" hidden>
          <img src="./Foto/back.ico" class="logo" >
          <img id="play-pause" class="logo" onclick="changeImage()" src="./Foto/Play_Icon.png">
          <img src="./Foto/skip.ico" class="logo">
      </div>

     
    <script type="text/javascript" src="script.js"></script>
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script> 
    
  </body>
</body>
</html>