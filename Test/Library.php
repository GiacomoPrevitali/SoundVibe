<?php
 session_start();
 if (isset($_SESSION['Nome'])){
 }else{
      header("Location: Login.php");
 }
?>
<!DOCTYPE html>
<head>
<title>Your Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="script.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
</head> 
<body>
<body>
<!-- modifica, elimina, scarica pdf -->
    <div class="sidebar">
      <div class="logo">
        <a href="#">
          <img src="data:image/png;base64,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" alt="Logo" />
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
              <span class="fa fas fa-book Scolor"></span>
              <span class="Scolor">Your Library</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="navigation">
        <ul>
          <li>
            <a href="Library.php">
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
      <div class="butLog">
                <a href="#">
                  <!--<button type="button" class="button1">Sign Up</button>-->
                  <h4 class="link AccountName" ><?php echo $_SESSION['Nome']; ?></h4>
                </a>
             
                <a href="destroy.php">
                  <h4 class="link logout">Logout</h4>
                </a>
            </div>
      </div>
      <h1 class="title"> La tua Libreria</h1>
      <div class="container">
            <div class="musicGroup first1"><h2>RAP</h2></div>
            <div class="musicGroup second1"><h2>HIP POP</h2></div>
            <div class="musicGroup third1"><h2>POP</h2></div>
            <div class="musicGroup fourth1"><h2>AFRO</h2></div>
            <div class="musicGroup add"><h2>NEW</h2></div>
      </div>
      <div class="favoriteCont">
        <div class="musicGroup favorite "><h2>Preferiti</h2></div>
      </div>
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
  </body>
</body>
</html>