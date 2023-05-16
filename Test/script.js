var Id;

function changeImage() {
    var image = document.getElementById("play-pause");
    if (image.src.match("./Foto/Play_Icon.png")) {
      image.src = "./Foto/Pause.ico";
    } else {
      image.src = "./Foto/Play_Icon.png";
    }
  }

function prova(){
  alert("ciao");
}
  function saveTokenToLocalStorage(token) {
    localStorage.setItem('jwtToken', token);
  }
 function FPlaylist(){
  getTokenFromLocalStorage();
 }
  // Recupera il token JWT dal localStorage
  function getTokenFromLocalStorage() {
    var token;
    token=localStorage.getItem('jwtToken');
    alert(token);
    if(token!=null){
    $.ajax({
      url: "Ajax/Token-JWT.php",     
      type: "POST",       
      dataType: "json",  
      data: {
        Jwt: localStorage.getItem('jwtToken')
      },
      success: function(data){
        if(data.result==1){
          document.getElementById("AccountName").innerHTML=data.payload.Nome;
          Id=data.payload.Id;
          console.log(Id);
          AddPlaylist();
        }else{
          alert("Token non valido");
          window.location.href="login.php";
        }
        
        localStorage.setItem('jwtToken', token);
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        alert(xhr.status);
        alert(thrownError);
      }
    })
  }else{
    window.location.href="login.php";
  }    //return token;
  }
// Rimuove il token JWT dal localStorage
  function removeTokenFromLocalStorage() {
  localStorage.removeItem('jwtToken');  
}

 $(document).ready(function() {
  document.getElementById("Login-Form").addEventListener("submit", (e) => {
    e.preventDefault();
      $.ajax({    
        url: "ajax/login.php",      
        type: "POST",       
        dataType: "json",  
        //contentType: "application/json; charset=utf-8",  
        data: {
          Mail: document.getElementById("Mail").value,
          Password: document.getElementById("Password").value
        },  
        success: function(data){ 
          if(data[0].Nome!='A'){
            //alert("Id "+data[0].Id);
          $.ajax({
            url: "Token-JWT/jwt.php",      
            type: "POST",       
            dataType: "json",  
            //contentType: "application/json; charset=utf-8",  
            data: {
              Id: data[0].Id,
              Nome: data[0].Nome,
              Cognome: data[0].Cognome,
              Codice_Fiscale: data[0].Codice_Fiscale,
              Data_Nascita: data[0].Data_Nascita,
              Mail: data[0].Mail,
              Password: data[0].Pass,
            },
            success: function(token){
              console.log(token);
              saveTokenToLocalStorage(token);
              console.log("ciao"+token);
              window.location.href="index.php";
            },
            error: function (data, xhr, ajaxOptions, thrownError) {
              console.log(data)
              alert(xhr.status);
              alert(thrownError);
            }
          })
        }else{
          alert("Mail o Password errata");
          //<div class="alert alert-danger my-4">Credenziali sbagliate</div>
        }  
        },
        error: function (data, xhr, ajaxOptions, thrownError) {
          console.log(data)
          alert(xhr.status);
          alert(thrownError);
        }
        
      });
  });
});


function AddPlaylist(){
  $.ajax({
    url: "ajax/QueryPlaylist.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      Id: Id,
    },
    success: function(data){
      var i=0; 
      if(data[0].Titolo!=null){
      $.each(data, function (key, value) {
       
        //data[i].Id,Id
        //document.getElementById("table").innerHTML+="<tr><td>"+data[i].Id+"</td><td>"+data[i].Nome+"</td><td>"+data[i].DataU+"</td><td>"+data[i].PesoEffettivo+"</td><td>"+data[i].AltezzaIniziale+"</td><td>"+data[i].DistanzaVerticale+"</td><td>"+data[i].DistanzaOrizzontale+"</td><td>"+data[i].DistanzaAngolare+"</td><td>"+val1+"</td><td>"+Pesolimte  +"</td><td>"+IndiceSollevamento+"</td><td>"+freq+"</td><td>"+data[i].Prezzo+"€</td><td id=checkVal"+i+">"+val+"</td><td>Visualizza</td><td onclick='Update("+data[i].Id+")'>Modifica</td><td onclick='Delete("+data[i].Id+")'>Cancella</td></tr>";
        document.getElementById("container1").innerHTML+='<div class="musicGroup first1 musicHome" id="playlist" onclick="GoTo('+data[i].Id+',Id);"><div class="play"><span onclick="GoPlaylist()"; class="fa fa-play"></span></div><h2 id="pl1">'+data[i].Titolo+'</h2></div>';
        //alert(data[i].Id);
        i++;
      })
    }else{
      //SISTEMARE
      document.getElementById("container1").innerHTML+='<div class="musicGroup first1 musicHome" id="playlist"><h2 id="pl1">Non hai ancora creato nessuna playlist</h2></div>';
    }
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(Id);
      alert(xhr.status);
      alert(thrownError);
    }
  })
}


function GoTo(IdP, IdU){
  alert(IdP+" "+IdU);

  $.ajax({
    url: "ajax/QuerySong.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      IdP: IdP,
      IdU: IdU
    },
    success: function(data){
     console.log(data[0].Titolo);
     AddSong(data);
      window.location.href="playlist.php";
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(Id);
      alert(xhr.status);
      alert(thrownError);
    }
  })
}


function AddSong(data){
 document.getElementById("table-container").innerHTML="ciao";
}