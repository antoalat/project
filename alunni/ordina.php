<html>
  <head>
      <title>
        Database
      </title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">
        Database ordinato:
      </div> 
        <table border="2">
          <tr>
            <th>Cognome </th>
            <th>Nome </th>
            <th>Etá </th>
          </tr>
          <?php
             require_once('config.php');
             if($result= mysqli_query($connessione, "SELECT * FROM $table ORDER BY Cognome"))
             {
                 if($result->num_rows==0)
                  {
                     echo "<h1>0 risultati trovati</h1>";
                  }
                 while($row=mysqli_fetch_row($result))
                 {
                     $cognome = htmlentities($row[0]);
                     $nome = htmlentities($row[1]);
                     $eta = htmlentities($row[2]);
                     if(!$eta) $eta='&nbsp; ';
                     echo "<tr>
                             <td>$cognome</td>
                             <td>$nome</td>
                             <td>$eta</td>
                         </tr>";
                 }
                 echo " </table>";
                 mysqli_free_result($result);
               }
             mysqli_close($connessione);
          ?>
      </table>
      <form method="post" action=" index.html">
        <div class="field">
          <input type="submit" value="Menu">
        </div>
    </div>
  </body>
</html>
