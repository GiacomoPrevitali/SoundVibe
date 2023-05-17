var Id;
var Nome;
var Cognome;
var IdP;
var IdU;
var audio;
function changeImage() {
    audio=document.getElementById("SongPlay");
   
    var image = document.getElementById("play-pause");
    if (image.src.match("./Foto/Play_Icon.png")) {
      image.src = "./Foto/Pause.ico";
      audio.play();
    } else {
      image.src = "./Foto/Play_Icon.png";
      audio.pause();
    }
  }
//-------------------------TOKEN JWT-------------------------//
  function saveTokenToLocalStorage(token) {
    localStorage.setItem('jwtToken', token);
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
          Nome=data.payload.Nome;
          Cognome=data.payload.Cognome;
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
  
  window.location.href="login.php" 
}
//-------------------------LOGIN-------------------------//
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
              saveTokenToLocalStorage(token);
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

function NewPlaylist(){
  window.location.href="newPlaylist.php";
}
function FPlaylist(){
  getTokenFromLocalStorage();
  AddSong();
  
}
function GoTo(IdP ,IdU){
  alert(IdP+" "+IdU);
  localStorage.setItem('IdP', IdP);
  localStorage.setItem('IdU', IdU);
  window.location.href="playlist.php";
}
function AddSong(){
  IdP=token=localStorage.getItem('IdP');
  IdU=token=localStorage.getItem('IdU');
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
     i=0;
     $.each(data, function (key, value) {
      j=i+1;
     document.getElementById("table").innerHTML+='<tr onclick="PlayMusic('+data[i].Id+');" ><td>'+j+'</td><td>'+data[i].Titolo+'</td><td>'+data[i].Artista+'</td><td>'+data[i].Album+'</td><td>'+data[i].Durata+'</td><td>'+data[i].Data_Aggiunta+'</td></tr>';
     i++;
    })
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(Id);
      alert(xhr.status);
      alert(thrownError);
    }
  })

}

function PlayMusic(Id){
  audio=document.getElementById("SongPlay"); 
  alert(Id);
  $.ajax({
    url: "ajax/Play.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      Id: Id,
    },
    success: function(data){
     console.log(data[0].audio_url);
      audio.src="Database/Audio/"+data[0].audio_url;
      document.getElementById("play-pause").src="./Foto/Pause.ico";
      audio.play();
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(Id);
      alert(xhr.status);
      alert(thrownError);
    }
  }) 
}

function Skip(){
  $.ajax({
    url: "ajax/Skip.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      IdP: IdP,
      IdU: IdU
    },
    success: function(data){
     console.log(data);
     const random=Math.floor(Math.random() * data.length);
     console.log(random, data[random].Id_Song);

     $.ajax({
      url: "ajax/Play.php",      
      type: "POST",       
      dataType: "json",  
      data: {
        Id: data[random].Id_Song,
      },
      success: function(data){
       console.log(data[0].audio_url);
        audio.src="Database/Audio/"+data[0].audio_url;
        document.getElementById("play-pause").src="./Foto/Pause.ico";
        audio.play();
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        alert(Id);
        alert(xhr.status);
        alert(thrownError);
      }
    }) 
     

    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(Id);
      alert(xhr.status);
      alert(thrownError);
    }
})
}
/*function GoTo(IdP, IdU){
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
}*/



$(document).ready(function() {
  document.getElementById("NewPlaylistForm").addEventListener("submit", (e) => {
    e.preventDefault();
    alert(Id);
   // var form =$('#NewPlaylistForm')[0];
    //var dataPl = new FormData(form);
    $.ajax({    
      url: "ajax/AddPlaylist.php",      
      type: "POST",       
      dataType: "json",  
      //processData: false,
      //contentType: false,
      //cache: false,
      data : {
      Nome: Nome,
      Cognome: Cognome,
      Id: Id,
      NomePl: document.getElementById("NomePl").value,
      Descrizione: document.getElementById("DescrPl").value,
      my_image: document.getElementById("my_image")
      },
 
      success: function(data){ 
       console.log(data);
       //AddPhoto();
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        alert(xhr.status);
        alert(thrownError);
      }
      
    });
  })
});


function AddPhoto() {
  $.ajax({    
    url: "ajax/upload.php",      
    type: "POST",       
    dataType: "json",  
    //contentType: "application/json; charset=utf-8",  
    data: {
      Id: Id,
      my_image: document.getElementById("FotoPlaylist").value,

    },  
    success: function(data){ 
     console.log(data);
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      alert(xhr.status);
      alert(thrownError);
    }
    
  });
}

function Search() {
  var inputElement = document.getElementById('searchbar'); // Assumi che il campo di input abbia l'id "inputField"
  
  inputElement.addEventListener('input', function() {
    $.ajax({
      url: "ajax/DynamicSearch.php",      
      type: "POST",       
      dataType: "json",  
      data: {
        valore: inputElement.value,
      },
      success: function(data){
        console.log(data);
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        alert(Id);
        alert(xhr.status);
        alert(thrownError);
      }
    })
  });
}
