<html>
  <head>
      <title>
        Tabella
      </title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">
        Database:
      </div> 
        <table border="2">
          <tr>
            <th>Nome </th>
            <th>Cognome </th>
            <th>Etá </th>
          </tr>
          <?php
            require_once('config.php');
            $sql="SELECT Nome, Cognome, Eta from $table";
            $result= $connessione->query($sql);
            if($result->num_rows>0)
            {
              while($row=$result->fetch_assoc())
              {
                echo "<tr><td>" . $row["Nome"] . "</td><td>" . $row["Cognome"] . "</td><td>" . $row["Eta"] . "</td></tr>";

              }
              echo "</table>";
            }
            else
            {
             echo "<h1>0 risultati trovati</h1>";
            }
            $connessione->close();
          ?>
      </table>
      <form method="post" action=" index.html">
        <div class="field">
          <input type="submit" value="Menu">
        </div>
    </div>
  </body>
</html>
