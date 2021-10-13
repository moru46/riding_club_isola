/*info js change color*/

  setInterval(function colore(){
         if(document.getElementById("dove_siamo").style.color == 'black'){
            document.getElementById("dove_siamo").style.color = 'red';
        }
        else if(document.getElementById("dove_siamo").style.color == 'red'){
            document.getElementById("dove_siamo").style.color = 'yellow';}
        else document.getElementById("dove_siamo").style.color = 'black';
    },999);