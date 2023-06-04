<head>
 <link rel="stylesheet" href="style.css">
</head>
         <?php
            require_once('config.php');
            if($_POST)
            {
              $cognome=$_POST['cognome'];
              $nome=$_POST['nome'];
              if($result= mysqli_query($connessione, "SELECT * FROM $table WHERE Cognome=('$cognome') and Nome=('$nome')"))
              {
                  echo 
                  "<div class='wrapper'>
                  <div class='title'>
                   Risultati:
                  </div>
                  <table border= '2'>
                      <tr>
                          <th>Nome</th>
                          <th>Cognome</th>
                          <th>Etá</th>
                      </tr>
                    </div>";
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
                              <td>$nome</td>
                              <td>$cognome</td>
                              <td>$eta</td>
                          </tr>";
                  }
                  echo "</table>
                    <div class='wrapper'>
                        <form method='post' action='index.html'>
                          <div class='field'>
                            <input type='submit' value='Menú'>
                          </div>
                        </form;
                      </div>";
                  mysqli_free_result($result);
                }
              mysqli_close($connessione);
            }
            else
            {
               echo "  <div class='wrapper'>
               <div class='title'>
                  Ricerca:
               </div>
               <form method='post'>
                  <div class='field'>
                     <input type='text' name='nome' required >
                     <label>Nome</label>
                  </div>
                  <div class='field'>
                     <input type='text'  name= 'cognome' required >
                     <label>Cognome</label>
                  </div>
                  <div class='field'>
                     <input type='submit' value='Invia'>
                  </div>
               </form>
               <form method='post' action='index.html'>
                     <div class='field'>
                        <input type='submit' value='Menú'>
                     </div>
               </form>
               </div>";
            }
          ?>
  