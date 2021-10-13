/*--------------------*/
/*Eliminazione utente e relativi aggiornamenti parte sold e parte training*/
/*sono presenti funzioni extra al fine di regolare l'aggirnameno degli altr modal dopo l'eliminazione di un utente*/ 

function cancellaUtente(nomeUtente){

        var data = nomeUtente.getAttribute("name");
        document.getElementById("contenuto3").innerHTML="";//cancella il contenuto del div/modal

        var xhr = new XMLHttpRequest();
        var urlToSend = './utility/cancella_utente2.php';
        xhr.open('POST', urlToSend, true);
        xhr.setRequestHeader("Content-type", "sql");
        xhr.send(data);
        console.log(data);
       

        // gestisco la risposta
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var requestResponse = xhr.responseText;
                document.getElementById('contenuto3').innerHTML = document.getElementById('contenuto3').innerHTML + requestResponse;
            } else {
                console.log('Servizio temporaneamente non disponibile');
            }
        }

        setTimeout(function(){
            aggiornaAllenamenti();
            aggiornaSoldi();},1000)
    }

 function rimuoviAllenamento(id){

        var data = id.getAttribute("name");
        document.getElementById("contenuto2").innerHTML="";//cancella il contenuto del div/modal

        var xhr = new XMLHttpRequest();
        var urlToSend = './utility/cancellaAllenamento.php';
        xhr.open('POST', urlToSend, true);
        xhr.setRequestHeader("Content-type", "sql");
        xhr.send(data);
        console.log(data);
       

        // gestisco la risposta
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var requestResponse = xhr.responseText;
                document.getElementById('contenuto2').innerHTML = document.getElementById('contenuto2').innerHTML + requestResponse;
             console.log('Allenamento rimosso correttamente');

            } else {
                console.log('Servizio temporaneamente non disponibile');
            }
        }
 }

 function confermaPagamento(id){

        var data = id.getAttribute("name");
        document.getElementById("contenuto1").innerHTML="";//cancella il contenuto del div/modal

        var xhr = new XMLHttpRequest();
        var urlToSend = './utility/conferma_pagamento.php';
        xhr.open('POST', urlToSend, true);
        xhr.setRequestHeader("Content-type", "sql");
        xhr.send(data);
        console.log(data);
       

        // gestisco la risposta
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var requestResponse = xhr.responseText;
                document.getElementById('contenuto1').innerHTML = document.getElementById('contenuto1').innerHTML + requestResponse;
             console.log('Pagamento confermato correttamente');

            } else {
                console.log('Servizio temporaneamente non disponibile');
            }
        }
 }


function cancellaPagamento(id){

        var data = id.getAttribute("name");
        document.getElementById("contenuto1").innerHTML="";//cancella il contenuto del div/modal

        var xhr = new XMLHttpRequest();
        var urlToSend = './utility/cancella_prenotazione.php';
        xhr.open('POST', urlToSend, true);
        xhr.setRequestHeader("Content-type", "sql");
        xhr.send(data);
        console.log(data);
       

        // gestisco la risposta
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var requestResponse = xhr.responseText;
                document.getElementById('contenuto1').innerHTML = document.getElementById('contenuto1').innerHTML + requestResponse;
             console.log('Pagamento cancellato correttamente');

            } else {
                console.log('Servizio temporaneamente non disponibile');
            }
        }
 }

 function aggiornaAllenamenti(){
    document.getElementById("contenuto2").innerHTML="";//cancella il contenuto del div/modal
     var xhr2 = new XMLHttpRequest();
        var urlToSend = './utility/aggiornaAllenamenti.php';
        xhr2.open('GET', urlToSend, true);
        xhr2.send(null);
       
       

        // gestisco la risposta
        xhr2.onreadystatechange = function (){
            if (xhr2.readyState === 4 && xhr2.status === 200) {
                var requestResponse = xhr2.responseText;
                //document.getElementById("contenuto2").innerHTML="";//cancella il contenuto del div/modal
                document.getElementById('contenuto2').innerHTML += requestResponse;
                 console.log('Aggiorno!');
            }/*else {
                console.log('Errore Aggiornamento Allenamenti');
            }*/ 
        }
    }

function aggiornaSoldi(){
    document.getElementById("contenuto1").innerHTML="";//cancella il contenuto del div/modal
     var xhr3 = new XMLHttpRequest();
        var urlToSend = './utility/aggiornaSoldi.php';
         xhr3.open('GET', urlToSend, true);
         xhr3.send(null);
        
       

        // gestisco la risposta
        xhr3.onreadystatechange = function (){
                var requestResponse = xhr3.responseText;
            if (xhr3.readyState === 4 && xhr3.status === 200){
                document.getElementById('contenuto1').innerHTML = document.getElementById('contenuto1').innerHTML + requestResponse;
                console.log('Aggiorno!');
            }
        }
    }

/*

function aggiornaAllenamenti(){
    document.getElementById("contenuto2").innerHTML="";//cancella il contenuto del div/modal
     var xhr2 = new XMLHttpRequest();
        var urlToSend = './utility/aggiornaAllenamenti.php';
        xhr2.open('GET', urlToSend, true);
       

        // gestisco la risposta
        xhr2.onreadystatechange = function (){
            if (xhr2.readyState === 4 && xhr2.status === 200) {
                var requestResponse = xhr2.responseText;
                //document.getElementById("contenuto2").innerHTML="";//cancella il contenuto del div/modal
                document.getElementById('contenuto2').innerHTML = document.getElementById('contenuto2').innerHTML + requestResponse;
                 console.log('Aggiorno!');
            } else {
                console.log('Errore Aggiornamento Allenamenti');
            }
        }
    }

function aggiornaSoldi(){
    document.getElementById("contenuto1").innerHTML="";//cancella il contenuto del div/modal
     var xhr3 = new XMLHttpRequest();
        var urlToSend = './utility/aggiornaSoldi.php';
        xhr3.open('GET', urlToSend, true);
       

        // gestisco la risposta
        xhr3.onreadystatechange = function (){
                var requestResponse = xh3r.responseText;
            if (xhr3.readyState === 4 && xhr3.status === 200){
                document.getElementById('contenuto1').innerHTML = document.getElementById('contenuto1').innerHTML + requestResponse;
                console.log('Aggiorno!');
            } else {
                console.log('Errore Aggiornamento Pagamenti');
            }
        }
    }
*/
/*le funzioni aggiornaSoldi() e aggiornaAllenamenti() sono utilizzate esclusivamente per la ristampa dei valori dopo l'aggiornamento*/
/*--------------*/


