<head>
 <link rel="stylesheet" href="style.css">
</head>
         <?php
            require_once('config.php');
            if($_POST)
            {
               $cognome1=$_POST['cognome'];
               $nome1=$_POST['nome'];
               $result= mysqli_query($connessione, "SELECT * FROM $table WHERE Cognome=('$cognome1') and Nome=('$nome1')");
               if($result->num_rows>0)
               {
                  $sql = "DELETE FROM $table WHERE Cognome = ('$cognome1') and Nome = ('$nome1')";
                  if($connessione->query($sql))
                  {
                     echo "<div class='wrapper'>
                     <div class='title'>
                         Cancella:
                     </div>
                     <form method='post' action='index.html'>
                        <div class='field'>
                         <label>Record cancellato</label>
                           </div>
                        <div class='field'>
                           <input type='submit' value='Menú'>
                        </div>
                     </form>
                     </div>";
                  }
                  else{
                     echo "<div class='wrapper'>
                  <div class='title'>
                         Cancellazione record
                  </div>
                  <form method='post' action='index.html'>
                     <div class='field'>
                        <label>Record non cancellato</label>
                     </div>
                     <div class='field'>
                        <input type='submit' value='Menu'>
                     </div>
                  </form>
                  </div>";
                  }
               }
               else{
                  echo "<div class='wrapper'>
                  <div class='title'>
                         Cancellazione record
                  </div>
                  <form method='post' action='index.html'>
                     <div class='field'>
                        <label>Persona non esistente</label>
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
                  Cancellazione record
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
  