//var image = document.querySelector('#image');
var playbreak=true;
function changeImage(image) {
    if(playbreak){
        image.src = './Foto/Break_Icon.png';
        document.getElementById("PlayBreak").classList.add('Image5');
        document.getElementById("PlayBreak").classList.remove('Image4');
        playbreak=!playbreak;
    }else{
        image.src = './Foto/Play_Icon.png';
        playbreak=!playbreak;
        document.getElementById("PlayBreak").classList.add('Image4');
        document.getElementById("PlayBreak").classList.remove('Image5');
    }
    
}