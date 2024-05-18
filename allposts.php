<?php

 
 try{
    include_once("includes/conn.php");
    $sql="SELECT * FROM `posts`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
<div class="text-center mt-4">
           <a href="addpost.php" ><button class="btn btn-primary">Add Post</button></a>
        </div>
    <div class="container mt-5">
        <h2 class="mb-4">Posts</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th >id</th>
                <th >title</th>
               <th>content</th>
               <th >edit</th>
               <th >show</th>
                <th >delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($stmt->fetchAll()as $row){
                $id=$row["id"];
                $title=$row["title"];
                $content=$row["content"];
           ?>
                <tr>
                <td><?php echo $id ?></td>
      <td><?php echo $title ?></td>
      <td><?php echo $content ?></td>
      <td><a href="editpost.php?id=<?php echo $id ?>"><img src="img/update.jpg" alt=""></a></td>
      <td><a href="show.php?id=<?php echo $id ?>"><img src="img/show.png" alt="" width="40px"></a></td>
      <td><a href="delete.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="img/delete.jpg" alt=""></a></td>
                </tr>
                <?php
                  }
                  ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqVSt94QDF+D6N6Mt9K5mkFL9t+P8xnGUVvY/e0pQm+8lWKN5I" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqVSt94QDF+D6N6Mt9K5mkFL9t+P8xnGUVvY/e0pQm+8lWKN5I" crossorigin="anonymous"></script>
</body>

</html>
