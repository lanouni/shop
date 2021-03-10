<?php
   try {
       $user = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=affiliate', $user, "");
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
       echo "erreur".$e->getMessage()."<br>";
       die();
   }
?>