<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <!--<script type="text/javascript" src="script.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <title>WORK</title>
</head>
<body onload="FPlaylist();"id="PlaylistPage" >
<div class="main-container">
      <div class="topbar">
        <div class="navbar">
           <div class="butLog">
                <a href="#">
                  <h4 type="button" id="AccountName" class="button1"></h4>
                 <!-- <h4 class="link AccountName"></h4>-->
                </a>
             
                <a href="destroy.php">
                    <h4  class="link logout" onclick="removeTokenFromLocalStorage();">Logout</h4>
                </a>
            </div>
        </div>
      </div>
<div id="table-container"></div>
    <table id="table" >
        <thead>
            <tr class="TitleTable bg-primary">
                <th class="thID">Id </th>
                <th class="thNA">Ragione Sociale</th>
                <th class="thDA">Data</th>
                <!--<th>Peso Effettivo (Kg)</th>-->
                <!--<th>Altezza Iniziale (Cm)</th>-->
              <!--  <th class="thDV">Distanza Verticale (Cm)</th>
                <th class="thDO">Distanza Orizzontale (Cm)</th>
                <th class="thAN">Distanza Angolare(°)</th>-->
                <!--<th>Fattore Presa</th>-->
                <th>Peso Limite (Kg)</th>
                <th class="thIS">Indice Sollevamento</th>
               <!-- <th>Frequenza al minuto</th>-->
                <th>Prezzo</th>
                <th>Validità</th>
                <th> PDF</th>
                <th>Modifica</th>
                <th>Elimina</th>                           
            </tr>
        </thead>
      </table>
    <script type="text/javascript" src="script.js"></script>
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>