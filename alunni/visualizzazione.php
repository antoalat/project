<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    ciao
<?php
echo "ciao";
$host = "localhost";
$user = "ligato5bi";
$password = "Sa100=100";
$database = "DB_Alunni_Ligato";

$link = new mysqli($host, $user, $password, $database);
//check connessione
if ($link === false)
    die ("Connessione fallita" . $link->connect_error);
//check righe esistenti
$sql = "SELECT * FROM  Alunni";
if($result = $link->query($sql))
    if($result->num_rows > 0){
        echo '<table>
            <tr class="header"><td>Nome</td><td>Cognome</td><td>Eta</td>'
         while ($row = $result->fetch_array()){
            echo '
                <tr>
                <td>' . $row['Nome'] . '</td>
                <td>' . $row['Cognome'] . '</td>
                <td>' . $row['Eta'] . '</td>
                </tr>
                    ';
            }
            echo "</table>";
            }
        else
            echo "Non ci sono righe esistenti";
        else
            echo "Impossibile esguire la query";

        ?>
</body>
</html>
