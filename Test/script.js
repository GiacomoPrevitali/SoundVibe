function changeImage() {
    var image = document.getElementById("play-pause");
    if (image.src.match("./Foto/Play_Icon.png")) {
      image.src = "./Foto/Break_Icon.png";
    } else {
      image.src = "./Foto/Play_Icon.png";
    }
  }