<head>
 <link rel="stylesheet" href="style.css">
</head>
         <?php
            require_once('config.php');
            if($_POST)
            {
               $cognome1=$_POST['cognome'];
               $nome1=$_POST['nome'];
               $eta1=$_POST['eta'];
               $connessione->query("INSERT INTO $table (Cognome,Nome,Eta) VALUES ('$cognome1','$nome1','$eta1')");
               if($connessione->connect_error)
               {
                  die("Errore nella query $query: ".mysql_error());
               }
               else
               {
                  echo "<div class='wrapper'>
                  <div class='title'>
                     Immetti
                  </div>
                  <form method='post' action='index.html'>
                     <div class='field'>
                        <label>Record inserito!</label>
                     </div>
                     <div class='field'>
                        <input type='submit' value='Menu'>
                     </div>
                  </form>
                  </div>";
                           
               }
               mysqli_close($connessione);
            }
            else
            {
               echo "  <div class='wrapper'>
               <div class='title'>
                  Immetti Dati
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
                     <input type='text'  name= 'eta' required >
                     <label>Età</label>
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
  