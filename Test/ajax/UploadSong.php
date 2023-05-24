<?php 

//if (isset($_POST['submit']) && isset($_FILES['my_audio'])) {
	
    $sname = "localhost";
    $uname = "SoundVibe_User";
    $password = "1234";
    $db_name = "soundvibe";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}


  /*  $audio_name = $_FILES['my_audio']['name'];
    $tmp_name = $_FILES['my_audio']['tmp_name'];
    $error = $_FILES['my_audio']['error'];

    if ($error === 0) {
    	$audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

    	$audio_ex_lc = strtolower($audio_ex);

    	$allowed_exs = array("3gp", 'mp3', 'm4a', 'wav', 'm3u','ogg');

    	if (in_array($audio_ex_lc, $allowed_exs)) {
    		
    		$new_audio_name = uniqid("video-", true). '.'.$audio_ex_lc;
    		$audio_upload_path = '../Database/Audio/'.$new_audio_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

    		// Now let's Insert the video path into database
            $sql = "INSERT INTO song(audio_url) 
                   VALUES('$new_audio_name')";
            mysqli_query($conn, $sql);*/



            $sql='SELECT Id FROM Song WHERE audio_url='.$new_audio_name.'';
            $result =$connection->query($sql);
            if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $Id=$row['Id'];
            }
        }
            echo '<script>'.$row['Id'].'</script>';
            header("Location: ../admin.php");
    	/*}else {
    		$em = "You can't upload files of this type";
    		header("Location: index.php?error=$em");
    	}
    }*/


//}else{
	//header("Location: index.php");
