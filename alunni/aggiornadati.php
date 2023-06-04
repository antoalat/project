<head>
 <link rel="stylesheet" href="style.css">
</head>
         <?php
            require_once('config.php');
            $vecchionome=$_GET['Nome'];
            $vecchiocognome=$_GET['Cognome'];
            $vecchiaeta=$_GET['Eta'];
            if($_POST)
            {
               $id=$_GET['id'];
               $nome=$_POST['nome'];
               $cognome=$_POST['cognome'];
               $eta=$_POST['eta'];
               $sql="UPDATE $table SET Cognome='$cognome', Nome='$nome', Eta='$eta' WHERE id='$id'";
               if($connessione->query($sql))
               {
                  echo "<div class='wrapper'>
                  <div class='title'>
                     Modifica dati
                  </div>
                  <form method='post' action='index.html'>
                     <div class='field'>
                        <label>Dati modificati!</label>
                     </div>
                     <div class='field'>
                        <input type='submit' value='Menu'>
                     </div>
                  </form>
                  </div>";
               }
               else{
                  echo "<div class='wrapper'>
                  <div class='title'>
                     Modifica dati
                  </div>
                  <form method='post' action='index.html'>
                     <div class='field'>
                        <label>Impossibile modificare i dati".$connessione->error."</label>
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
                  Aggiorna Dati
               </div>
               <form method='post'>
                  <div class='field'>
                     <input type='text' name='nome' value='$vecchionome' required >
                     <label>Nome</label>
                  </div>
                  <div class='field'>
                     <input type='text'  name= 'cognome' value='$vecchiocognome' required >
                     <label>Cognome</label>
                  </div>
                  <div class='field'>
                     <input type='text'  name= 'eta' value='$vecchiaeta' required >
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
  