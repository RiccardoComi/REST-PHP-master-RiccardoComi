<?php

//FUNZIONI get & post per definire il comportamento dei metodi
function get($uri){

    $array = explode('?', $uri);  //divide le stringhe tramite il parametro passato (?)
    $uri = $array[0];

    $headers = apache_request_headers();   //prende l'header http
    switch ($uri) {
            //case"/";
            //index();
            //break;
        case '/listaEsercenti':
            getListaEsercenti($headers);
            break;
        case '/listaQuestionari':
            getListaQuestionari($headers);
            break;
        case '/dashboard':
            getDashboard($headers);
            break;
        case '/aggiungiEsercente':         //la funzione post "aggiungiEsercente" va creata anche in get per farla funzionare con la post
            getAggiungiEsercente($headers);
            break;
        default:
            notFound();
            break;
    }
}

function post($uri){
    $headers = apache_request_headers();
    switch ($uri) {

        case '/aggiungiEsercente':
            postAggiungiEsercente();
            break;
        
        default:
            notFound();
            break;
    }
}

function notFound(){
    http_response_code(404);
    echo "404 Classico Not Found";
}

function badRequest(){
    http_response_code(400);
    echo "Method not implemented";
}

//FUNZIONI GET:

function getDashboard($headers) {
    require __DIR__ . '/../model/object.php';
    $array = getDatiDashboard();
    if (strpos($headers["Accept"], "html")) {
        require __DIR__ . '/../view/dashboard.php';
        visualizzaDashboard($array[0], $array[1]);
    } else {
        echo $array;
    }
}

function getAggiungiEsercente($headers) {
    require __DIR__ . '/../model/object.php';
    if (strpos($headers["Accept"], "html")) {
        require __DIR__ . '/../view/aggiungiEsercente.php';
        visualizzaAggiungiEsercente();
    } else {

        $r2 = getEsercentiDashboard();
        if(strpos($headers["Accept"], "html")) {
            visualizzaEsercentiDashboard($r2);
        } else {
            echo $r2;
        }      echo "errore";
    }
}

function getListaEsercenti($headers) {
    require __DIR__ . '/../model/object.php';
    $r = getEsercenti();
    if (strpos($headers["Accept"],"html")) {
        require __DIR__ . '/../view/listaEsercenti.php';
        visualizzaEsercenti($r);
    } else {
        echo $r;
    }
}

function getListaQuestionari($headers) {
    require __DIR__ . '/../model/object.php';
    $r = getQuestionari();
    if (strpos($headers["Accept"], "html")) {
        require __DIR__ . '/../view/listaQuestionari.php';
        visualizzaQuestionari($r);
    } else {
        echo $r;
    }
}

//FUNZIONI POST:

//function postQualcosa(){ //var_dump($_POST); //echo "<br/>ho fatto la post\n";

function postAggiungiEsercente() {
    require __DIR__ . '/../model/object.php';
    postAddEsercente();
}

?>