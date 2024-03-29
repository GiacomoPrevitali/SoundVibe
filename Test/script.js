var Id;
var Nome;
var Cognome;
var IdP;
var IdU;
var audio;
var nomeA;
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
  function saveTokenToLocalStorage(token) {
    localStorage.setItem('jwtToken', token);
  }
  // Recupera il token JWT dal localStorage
  function getTokenFromLocalStorage() {
    var token;
    token=localStorage.getItem('jwtToken');
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
          localStorage.setItem('IdUtente', Id);
          AddPlaylist();
        }else{
          //alert("Token non valido");
          window.location.href="login.php";
        }
        
        localStorage.setItem('jwtToken', token);
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
      }
    })
  }else{
    window.location.href="login.php";
  }    //return token;
  }
// Rimuove il token JWT dal localStorage
  function removeTokenFromLocalStorage() {
  localStorage.removeItem('jwtToken'); 
  
  window.location.href="login.php";
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
            nomeA=data[0].Nome;
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
              if(nomeA=='B'){
                window.location.href="admin.php";
              }else{
              window.location.href="index.php";
              }
            },
            error: function (data, xhr, ajaxOptions, thrownError) {
              console.log(data)
            }
          })

       
        }else{
          alert("Mail o Password errata");
          //<div class="alert alert-danger my-4">Credenziali sbagliate</div>
        }  
        },
        error: function (data, xhr, ajaxOptions, thrownError) {
          console.log(data)
          //alert(xhr.status);
          //alert(thrownError);
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
      //alert(data.length);
      if(data.length!=1){
      $.each(data, function (key, value) {
       
       if(data[i].Titolo!="Preferiti"){
        document.getElementById("container1").innerHTML+='<div class="musicGroup musicHome" id="playlist'+i+'" onclick="GoTo('+data[i].Id+',Id);"><div class="play"><span onclick="GoPlaylist()"; class="fa fa-play"></span></div><h2 id="pl1">'+data[i].Titolo+'</h2></div>';
        document.getElementById("playlist"+i).style.backgroundImage="url(./Database/Foto/"+data[i].Immagine+")";
        document.getElementById("playlist"+i).style.backgroundSize="cover";
      }else{
      
      }
        i++;
      })
    }else{
      document.getElementById("plVuote").innerHTML+='<p>Al momento non sono presenti Playlist</p>';
    }
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
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
  //alert(IdP+" "+IdU);
  localStorage.setItem('IdP', IdP);
  localStorage.setItem('IdU', IdU);
  window.location.href="playlist.php";
}
function AddSong(){
  IdP=token=localStorage.getItem('IdP');
  IdU=token=localStorage.getItem('IdU');

  $.ajax({
    url: "ajax/QuerySong.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      IdP: IdP,
      IdU: IdU
    },
    success: function(data){
      if(data[0].Id!="A"){
     console.log(data[0].Titolo);
     i=0;
     $.each(data, function (key, value) {
      j=i+1;
     document.getElementById("table").innerHTML+='<tr onclick="PlayMusic('+data[i].Id+');" ><td>'+j+'</td><td>'+data[i].Titolo+'</td><td>'+data[i].Artista+'</td><td>'+data[i].Album+'</td><td>'+data[i].Durata+'</td><td>'+data[i].Data_Aggiunta+'</td><td><img src="./Foto/cestino.jpg" class="bucket" onclick=DeleteSong('+data[i].Id_Song+');></a></td></tr>';
     i++;
     
    })
    }
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      //alert(Id);
      //alert(xhr.status);
      //alert(thrownError);
    }
  })

}

function PlayMusic(Id){
  audio=document.getElementById("SongPlay"); 
  //alert(Id);
  $.ajax({
    url: "ajax/Play.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      Id: Id,
    },
    success: function(data){
      audio=document.getElementById("SongPlay");
      document.getElementById("FotoSong").hidden=false;
      document.getElementById("FotoSong").src="./Database/Foto/"+data[0].Immagine;
      console.log(data[0].audio_url);
      document.getElementById("SongPlay").src="Database/Audio/"+data[0].audio_url;
      console.log
      document.getElementById("play-pause").src="./Foto/Pause.ico";
      audio.play();
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
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
        document.getElementById("FotoSong").hidden=false;
        document.getElementById("FotoSong").src="./Database/Foto/"+data[0].Immagine;
       console.log(data[0].audio_url);
        audio.src="Database/Audio/"+data[0].audio_url;
        document.getElementById("play-pause").src="./Foto/Pause.ico";
        audio.play();
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
      }
    }) 
     

    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
    }
})
}

/*$(document).ready(function() {
  document.getElementById("NewPlaylistForm").addEventListener("submit", (e) => {
    alert("ciao");
    e.preventDefault();
    $.ajax({    
      url: "ajax/AddPlaylist.php",      
      type: "POST",       
      dataType: "json",  
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
        //alert(xhr.status);
        //alert(thrownError);
      }
      
    });
  })
});*/


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
      //alert(xhr.status);
      //alert(thrownError);
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
        //console.log(data);
        var result;
        if(data.length>4){
          result=4;
        }else{
          result=data.length;
        }
        if(data.length>0){
          if(data[0].Titolo=='A'){
            document.getElementById("listResult").innerHTML="";
          }else{
            document.getElementById("listResult").innerHTML="";
            for(var i=0; i<result; i++){
              //alert(data[i].Titolo);
              localStorage.setItem('Id_Song', data[i].Id);
              document.getElementById("listResult").innerHTML+='<a href="Song.php"><li id="result1" class="list-group-item">    '+data[i].Titolo+'</li></a>';

            }
          }
          if(inputElement.value==""){
            document.getElementById("listResult").innerHTML="";
          }
         // document.getElementById("listResult").innerHTML="";
        }
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        //alert(Id);
        //alert(xhr.status);
        //alert(thrownError);
      }
    })
  });
}

function RiempiNome(){
  getTokenFromLocalStorage();
  var Id_Song=localStorage.getItem('Id_Song');
  //(Id_Song);
  $.ajax({
    url: "ajax/RiempiSong.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      Id: Id_Song,
    },
    success: function(data){
      console.log(data);
      document.getElementById("SongTitle").innerHTML=data[0].Titolo;
      document.getElementById("SongCont").style.backgroundImage="url(./Database/Foto/"+data[0].Immagine+")";
      document.getElementById("SongCont").style.backgroundSize="cover";
      //document.getElementById("Titolo").innerHTML=data[0].Titolo;
     document.getElementById("TableSong").innerHTML+='<tr><td>'+data[0].Titolo+'</td><td>'+data[0].Artista+'</td><td>'+data[0].Album+'</td><td>'+data[0].Durata+'</td><td>'+data[0].Data_Aggiunta+'</td></tr>';
    //alert(Id);
     $.ajax({
      url: "ajax/allPlaylist.php",      
      type: "POST",       
      dataType: "json",  
      data: {
        Id: Id,
      },
      success: function(data){
        console.log(data);
        for(var i=0; i<data.length; i++){
          
        document.getElementById("SelectPlaylist").innerHTML+='<option value="'+data[i].Id+'">'+data[i].Titolo+'</option>'; 
        }
      
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        //alert(Id);
        //alert(xhr.status);
        //alert(thrownError);
      }
    })
    
    
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      //alert(Id);
      //alert(xhr.status);
      //alert(thrownError);
    }
  })
}

$(document).ready(function() {
  document.getElementById("Like").addEventListener("click", (e) => {
    var Id_Song=localStorage.getItem('Id_Song');
    var IdU=localStorage.getItem('IdUtente');
    //alert(IdU);
    e.preventDefault();
      $.ajax({    
        url: "ajax/AddOnPlaylist.php",      
        type: "POST",       
        dataType: "json",  
        //contentType: "application/json; charset=utf-8",  
        data: {
          IdU: IdU,
          IdS: Id_Song,
          IdP: document.getElementById("SelectPlaylist").value,
        },  
        success: function(data){ 
        console.log(data); 
        },
        error: function (data, xhr, ajaxOptions, thrownError) {
          console.log(data)
          //alert(xhr.status);
          //alert(thrownError);
        }
        
      });
  });
});

function LikedPage(){
  
  getTokenFromLocalStorage();
  IdU=token=localStorage.getItem('IdU');
  $.ajax({
    url: "ajax/QuerySongPref.php",      
    type: "POST",       
    dataType: "json",  
    data: {
      IdU: IdU
    },
    success: function(data){
      localStorage.setItem('IdP', data[0].Id);
      AddSong();
 
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)

    }
  })
  
}


$(document).ready(function() {
  document.getElementById("LikeSongPatt").addEventListener("click", (e) => {
    window.location.href = "Liked.php";
  });
});


$(document).ready(function() {
  document.getElementById("AddPlaylist").addEventListener("submit", (e) => {
    e.preventDefault();
    $.ajax({    
      url: "ajax/AddPlaylist.php",      
      type: "POST",       
      dataType: "json",  
      data : {
      Nome: Nome,
      Cognome: Cognome,
      Id: Id,
      TitoloPlaylist: document.getElementById("TitoloPlaylist").value,
      DescrizionePlaylist: document.getElementById("DescrizionePlaylist").value,
      //ImmaginePlaylist: document.getElementById("ImmaginePlaylist").value,
      },
 
      success: function(data){ 
        $.ajax({    
          url: "ajax/AddPlaylist2.php",      
          type: "POST",       
          dataType: "json",  
          data : {
          Titolo: document.getElementById("TitoloPlaylist").value,
          },
          success: function(data){
            document.getElementById("valorePl").value=data[0].Id;

          },
          error: function (data, xhr, ajaxOptions, thrownError) {
            console.log(data)
          }
    })
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
      }
      
    });
  })
});



function DeletePlaylist(){
  $.ajax({    
    url: "ajax/DeletePlaylist.php",      
    type: "POST",       
    dataType: "json",  

    data : {
    IdP : IdP,
    IdU: IdU,
    },

    success: function(data){ 
     console.log(data);
     window.location.href = "index.php";
     //AddPhoto();
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      //alert(xhr.status);
      //alert(thrownError);
    }
    
  });
}

function DeleteSong(IdDel){
  //alert(IdDel);
  $.ajax({    
    url: "ajax/DeleteSong.php",      
    type: "POST",       
    dataType: "json",  

    data : {
    IdS : IdDel,
    IdP : IdP,
    IdU: IdU,
    },

    success: function(data){ 
     console.log(data);
     window.location.href = "index.php";
     //AddPhoto();
    },
    error: function (data, xhr, ajaxOptions, thrownError) {
      console.log(data)
      //alert(xhr.status);
      //alert(thrownError);
    }
    
  });
}



$(document).ready(function() {
  document.getElementById("Registrazione").addEventListener("submit", (e) => {
    e.preventDefault();
    $.ajax({    
      url: "ajax/AddUser.php",      
      type: "POST",       
      dataType: "json",  

      data : {
        Nome: document.getElementById("NomeR").value,
        Cognome: document.getElementById("CognomeR").value,
        Codice_Fiscale: document.getElementById("CfR").value,
        Mail: document.getElementById("MailR").value,
        Password: document.getElementById("PasswordR").value,
        Data_Nascita: document.getElementById("DataNR").value,

      },
 
      success: function(data){
        console.log(data);
      if(data[0].Id=="B"){
        alert("Mail non valida");
      }else{
        window.location.href="login.php";
      }
       
       
       //AddPhoto();
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        //alert(xhr.status);
        //alert(thrownError);
      }
      
    });
  })
});




var songSlider = document.getElementById('song-slider');
var songPlay = document.getElementById('SongPlay');
var timerDisplay = document.getElementById('timer');

// Aggiungi un event listener per il cambiamento del valore dello slider
songSlider.addEventListener('input', function() {
  var value = this.value;
  // Calcola il tempo in base al valore dello slider (es. 50% del brano)
  var duration = songPlay.duration;
  var newPosition = (duration / 100) * value;
  
  // Imposta la nuova posizione del brano
  songPlay.currentTime = newPosition;
});

// Aggiungi un event listener per l'evento "timeupdate" dell'elemento audio
songPlay.addEventListener('timeupdate', function() {
  // Aggiorna la posizione dello slider in base al tempo corrente del brano
  var duration = songPlay.duration;
  var currentTime = songPlay.currentTime;
  var percentage = (currentTime / duration) * 100;

  // Imposta il valore dello slider in base al tempo corrente del brano
  songSlider.value = percentage;
});


songPlay.addEventListener('ended', function() {
 Skip();
});


songPlay.addEventListener('timeupdate', function() {
  // Aggiorna la posizione dello slider in base al tempo corrente del brano
  var duration = songPlay.duration;
  var currentTime = songPlay.currentTime;
  var percentage = (currentTime / duration) * 100;

  // Imposta il valore dello slider in base al tempo corrente del brano
  songSlider.value = percentage;

  // Aggiorna il timer
  var currentMinutes = Math.floor(currentTime / 60);
  var currentSeconds = Math.floor(currentTime % 60);
  var formattedTime = currentMinutes + ':' + (currentSeconds < 10 ? '0' : '') + currentSeconds;
  timerDisplay.textContent = formattedTime;
});


