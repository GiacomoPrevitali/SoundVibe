<!DOCTYPE html>
<head>
<title>Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <!--<script type="text/javascript" src="script.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head> 
<body onload="RiempiNome();">
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
              <span class="fa fa-search Scolor"></span>
              <span class="Scolor">Search</span>
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
              <span class="fa fas fa-heart"></span>
              <span>Liked Songs</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-container">
      <div class="topbar">
        <!--Search Bar-->
        <div class="list-group">
        <div class="resultSearch">
          <ul id="listResult">
          </ul>
        </div>
        </div>
        <div class="search-bar">
          <input type="text" placeholder="Search a song" id="searchbar" onkeyup="Search();" />
          <img src="./Foto/lente.ico" alt="lente" width="40px"/>
        </div>
        <div class="butLog">
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
            <div class="musicGroup" id="SongCont"><h2 id="SongTitle"></h2></div>
            <table class="TableSong" id="TableSong">
              <tr><td>Titolo</td><td>Artista</td><td>Album</td><td>Durata</td><td>Data di Uscita</td></tr>
            </table>
            <br>
            <div class="select-container">
            <select id="SelectPlaylist">
              <option value="0" disabled selected>Playlist</option>
            </select>
            </div>
           <input type="button" value="Aggiungi" id="Like" class="pref">
        </div>
      </div>
        <hr>
      </div>

     
      </div>
    </div>
    
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="script.js"></script>

</body>
</html>