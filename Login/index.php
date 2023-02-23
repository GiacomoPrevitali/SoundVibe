

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="script.js"></script>



       
       </head>
<body>
<body>
	<div class="main">  	
			<div class="signup">
                <form method="POST" action="index.php">
					<label >Sign up</label>
					<input type="email"     name="Mail"         placeholder="Email"     required  pattern="[^ @]*@[^ @]*">
					<input type="password"  name="Password"     placeholder="Password"  required>
					<button type="submit">ACCEDI</button>
				</form>
                <label class="l_registrazione">Non sei registrato?</label>
                <form action="../Registrazione/index.php">
                    <button class="b_registrazione">REGISTRATI</button>
                </form>
		
    <?php
    session_start();
        if (isset($_POST['Mail'])){
            $ip= '127.0.0.1';
            $username='root';
            $password='';
            $database='SoundVibe';

            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
            $sql ='SELECT Nome  FROM users WHERE Pass="'.md5($_POST['Password']).'" AND mail="'.$_POST['Mail'].'" ';
            $result =$connection->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                
<<<<<<< Updated upstream
                  header("Location: ../Test/index.php");
                  
=======
                  header("Location: ../Home/index.php");
                  $_SESSION['Nome'] = $row['Nome'];
>>>>>>> Stashed changes
                }
              }else{
                echo '<div class="alert alert-danger my-4">Credenziali sbagliate</div>';
              }


        }

?>
	</div>
	</div>
</body>
</html>



