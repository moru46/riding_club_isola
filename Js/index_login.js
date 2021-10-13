
/*indice login*/

     
    var aiuto = document.getElementById("benvenuto");
    
    setInterval(function colore(){
         if(aiuto.style.color == 'black'){
            aiuto.setAttribute("style","color:brown");
        }
        else aiuto.setAttribute("style","color:black");
    },999);