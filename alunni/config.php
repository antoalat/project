<?php
    $host="localhost";
    $user="alati5bi";
    $password="Sa100=100";
    $db="DB_Alati";
    $table="Alunni";
    $connessione= new mysqli($host,$user,$password, $db);
    if($connessione===false)
    {
        die("Errore durante la connessione: " . $connessione->connect_error); 
    }
?>