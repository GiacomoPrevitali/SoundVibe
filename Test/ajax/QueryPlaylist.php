<?php 
require_once('config.php');
$Id=$_POST['Id'];
//$sql ='SELECT * FROM '.$Id.'_2';
$sql ='SELECT * FROM 38_2';
$result =$connection->query($sql);
//echo $Id;
$json=array();  
if($result->num_rows>0){
   /* while($row=$result->fetch_assoc()){
        $Titolo=$row['Titolo'];
        echo '
                <div class="musicGroup first1 musicHome">
                  <div class="play">
                    <span onclick="GoPlaylist()" class="fa fa-play"></span>
                  </div>
                  <h2>'.$Titolo.'</h2>
              </div>';

    }
  }else{
    echo '<div class="alert alert-danger my-4">Nessuna Playlist</div>';
  }*/

  while($row=mysqli_fetch_assoc($result)){
    array_push($json,$row);
  }
}else{
    $null=array('Titolo'=>'A');
    array_push($json,$null);
}
echo json_encode($json);
?>