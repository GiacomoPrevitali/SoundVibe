<!DOCTYPE html>
<<<<<<< Updated upstream
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
    <title>SoundVibe</title>
</head>
<body>
 <div class="sidebar">
    <div class="logo">
        <a href="#">
        <img src="logo.png" alt="logo"/>
        </a>
    </div>
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="fa fas fa-plus"></span>
                    <span> Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-search"></span>
                    <span> Search</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fas fa-book"></span>
                    <span> Your Library</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="fa fa-home"></span>
                    <span> Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-search"></span>
                    <span> Search</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fas fa-book"></span>
                    <span> Your Library</span>
                </a>
            </li>
        </ul>
    </div>
 </div>
    <script>
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    </script>
</body>
=======
<html>
    <head>
        <title>SoundVibe</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
    <div class="left">
        <div class="accountF">
            <img src="Foto/account_Icon.jpg" alt="Icon Account" class="accountImg">
            <div class="name">
            <?php
            session_start();
            echo $_SESSION['Nome'];
            ?>
            </div>
        </div>
    </div>

    </body>
>>>>>>> Stashed changes
</html>