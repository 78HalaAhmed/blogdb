<?php

if(isset( $_GET["id"])){
 try{
    include_once("includes/conn.php");
     $id=$_GET["id"];
     $sql="DELETE FROM `posts` WHERE id = ?";
     $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
     header("location:allposts.php");
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();}
}else{
       echo "ivalid request";
}



?>