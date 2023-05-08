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
    //alert(token);
  }

  // Recupera il token JWT dal localStorage
  function getTokenFromLocalStorage() {
    var token;
    token=localStorage.getItem('jwtToken');
    console.log(token);
    $.ajax({
      url: "Ajax/Token-JWT.php",     
      type: "POST",       
      dataType: "json",  
      //contentType: "application/json; charset=utf-8",  
      data: {
        Jwt: localStorage.getItem('jwtToken')
      },
      success: function(data){
        console.log(data.payload);
       // localStorage.setItem('jwtToken', token);
        //window.location.href="index.php";
      },
      error: function (data, xhr, ajaxOptions, thrownError) {
        console.log(data)
        alert(xhr.status);
        alert(thrownError);
      }
    })
    //return token;
  }

// Rimuove il token JWT dal localStorage
  function removeTokenFromLocalStorage() {
  localStorage.removeItem('jwtToken');  
}




/*function GoPlaylist() {
 alert("ciao");
 }*/

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

          
          $.ajax({
            url: "Token-JWT/jwt.php",      
            type: "POST",       
            dataType: "json",  
            //contentType: "application/json; charset=utf-8",  
            data: {
              Nome: data[0].Nome,
              Cognome: data[0].Cognome,
              Codice_Fiscale: data[0].Codice_Fiscale,
              Data_Nascita: data[0].Data_Nascita,
              Mail: data[0].Mail,
              Password: data[0].Pass,
            },
            success: function(token){
              console.log(token);
              localStorage.setItem('jwtToken', token);
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
