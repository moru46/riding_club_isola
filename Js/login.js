 /*login change div for register and login*/

   var div_reg = document.getElementById('registrazione');
    var div_log = document.getElementById('div_login');
    var centro = document.getElementById('centro_1');
    var fondo = document.getElementById('fondo');

    
    function cambia1(){
        div_reg.setAttribute("style","display: block");
        div_log.setAttribute("style","display: none");
        fondo.setAttribute("style","top: 88vw");
        centro.setAttribute("style","height: 88vw");}
    
    function cambia2(){
        div_reg.setAttribute("style","display: none");
        div_log.setAttribute("style","display: block");
        fondo.setAttribute("style","top: 40vw");
        centro.setAttribute("style","height: 40vw");}