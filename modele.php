<?php
session_start();
 include("connectbd.php");
 $s="select * from eleves";
 $result=mysqli_query($reg,$s);
 ?>