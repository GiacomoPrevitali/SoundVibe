<!DOCTYPE html>
<html>
    <head>
    <title>Registrazione</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_registrazione.css" />
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<script type="text/javascript" src="script.js"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    </head>
    <body>
        <center>
        <div class="square">
            <form method="POST" id="Registrazione">
                    <input type="text"      Id="NomeR"       name="Nome"             placeholder="Nome"              required    class="Input"><br>
                    <input type="text"      Id="CognomeR"    name="Cognome"          placeholder="Cognome"           required    class="Input"><br>
                    <input type="text"      Id="CfR"         name="Codice_Fiscale"   placeholder="Codice Fiscale"    required    class="Input"><br>
                    <input type="date"      Id="DataNR"      name="Data_Nascita"     placeholder="Data di nascita "  required    class="Input"><br>
                    <input type="mail"      Id="MailR"       name="Mail"             placeholder="Mail"              required    class="Input"><br>
                    <input type="password"  Id="PasswordR"   name="Password"         placeholder="Password"      required    class="Input"><br>
                
                <button type="submit" class="r">REGISTRATI</button>
            </form>
        </div>
        </center>


        

        <script type="text/javascript" src="script.js"></script>
       <!-- <script type="text/javascript" src="scriptRegistrazione.js"></script>-->
    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script> 
    
    </body>
</html>