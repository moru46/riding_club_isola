/*home javaScript change color*/
    var aiuto = document.getElementById("help");
    
    setInterval(function colore(){
         if(aiuto.style.color == 'white'){
            aiuto.setAttribute("style","color:red");
        }
        else aiuto.setAttribute("style","color:white");
    },500);
