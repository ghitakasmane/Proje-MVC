<?php
include "modele.php";
if (isset($_POST['ajout']) && !empty($_FILES['image'])){
     $cne=$_POST['cne'];
     $name=$_POST['name'];
     $prenom=$_POST['prenom'];
     $adresse=$_POST['adresse'];
     $ville=$_POST['ville'];
     $email=$_POST['email'];
     $etat=$_POST['etat'];
     $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
          $expensions= array("jpeg","jpg","png","jfif");
     
     $s="select * from eleves where CNE='$cne'";
     $requete=mysqli_query($reg,$s);
     $num=mysqli_num_rows($requete);
      if($num==1){
          echo "login already taken";
      }
      else{
    
        if(file_exists($file_name)) {
            echo "Sorry, file already exists.";
            }
          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
    
          if($file_size > 2097152){
             $errors[]='File size must be excately 2 MB';
          }
    
          if(empty($errors)==true){
          
            move_uploaded_file($file_tmp,"uploads/".$file_name);
            echo "Success";
            $req="insert into eleves values ('','$cne','$name','$prenom','$adresse','$ville','$email','$file_name','$etat')";
            $done=mysqli_query($reg,$req); 
            if($done){
                     echo "Student Added  sucefully";
                     header('location:liste.php');
                    }
                     else {echo "something went wrong";}
    
                }
        }
      }
        else{echo "<h2> Vous devez remplir tous les champs requis </h2>";}
    ?>