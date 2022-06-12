
<?php include "modele.php";
?>
<!DOCTYPE HTML>
  <html>
    <head>
      <link rel="stylesheet" type="text/css" href="form2.css">

      <link rel="stylesheet" type="text/css" href="main.css">
    </head> 
    <ul>
      <li> <a href="deconnexion.php" >Déconnexion </a></li>
      <li> <a href="liste.php" > Actualiser </a> </li>
      <li><button class="open-button" onclick="openForm()"> Ajouter un eleve </button></li>
    </ul>

    <body>
      <div class="container-table100">
        <h1 align=center style="color:white"> LISTE DES ELEVES </h1> 
        <table align=center border="5px" >
          <div class="limiter">
            <tr>
              <th> CNE </th>
              <th> NOM </th>
              <th> PRENOM </th>
              <th> ADRESSE </th>
              <th> VILLE  </th>
              <th> EMAIL </th>
              <th> IMAGE </th>
              <th> ETAT </th>
            </tr>

            <?php   // LOOP TILL END OF DATA 
           while($rows=$result->fetch_assoc()) {?>
           <tr>
             <td class="column1"><?php echo $rows['CNE'];?> </td>
             <td class="column2"><?php echo $rows['Nom'];?></td>
             <td class="column3"><?php echo $rows['Prenom'];?></td>
             <td class="column4"><?php echo $rows['Adresse'];?></td>
             <td class="column5"><?php echo $rows['Ville'];?></td>
             <td class="column6"><?php echo $rows['email'];?></td>
             <td class="column7"><img src=<?php echo "uploads/".$rows['Photo']; ?> alt="student_picture" height="100" width="100"></td>
             <td class="column8"><?php echo $rows['etat'];?></td>      
            </tr>
            <?php }?>
          </div>
        </table>
      </div>
      <table  align="center">
          <div class="form-popup" id="myForm">
            <form action=controller.php" method="post"  enctype="multipart/form-data" class="form-container">
                <div align=center>
                  NOM  :
                  <input type="text" name="name" value=<?php $name ?>><br>
                </div>
                <br>
                <div align=center>
                    Prenom: 
                    <input type="text" name="prenom" value=<?php $prenom ?>><br>
                </div>
                <br>
                <div align=center>Adresse:
                    <input type="text" name="adresse" value=<?php $adresse ?>><br>
                </div>
                <br>
                <div align=center>
                    CNE    :
                    <input type="text" name="cne" value=<?php $cne ?>><br>
                </div>
                <div align=center>
                    VILLE    :
                    <input type="text" name="ville" value=<?php $ville ?>><br>
                </div>
                <div align=center>
                    Email    :
                    <input type="text" name="email" value=<?php $email ?>><br>
                </div>
                <div align=center>
                    Etat    :
                    <input type="number" name="etat" value=<?php $etat ?>><br>
                </div>
                <br>
                <div align=center>
                    <input type="file" name="image" > 
                </div>
                <br>
                <div class="ghost" align=center>
                    <button type="submit" name="ajout" value="Ajouter un eleve " class="btn">Ajout élève </button>
                </div>
                <br>
                <div class="ghost" align=center>
                    <button type="button"  class="btncancel" onclick="closeForm()">Close</button>
                </div>
                <br>
            </form>
        </div>
     </table>
     <script language="javascript">
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
        function closeForm() {
            document.getElementById("myForm").style.display = "none"
        }
     </script>
</body>
</html>
