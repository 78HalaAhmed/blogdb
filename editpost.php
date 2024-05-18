<?php
include_once("includes/conn.php");
if(isset($_GET["id"])){
	$id=$_GET["id"];
}else{
	$id=$_POST["id"];
	$title=$_POST["title"];
    $content=$_POST["content"];
	$sql="UPDATE `posts` SET `title`=?,`content`=? where id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$title,$content,$id]);
	header("location:allposts.php");
}


try{
	$sql="SELECT * FROM `posts` WHERE id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
	$row= $stmt->fetch();
	$id=$row["id"];
	$title=$row["title"];
	$content=$row["content"];

}catch(PDOException $e){
   echo "Connection failed: " . $e->getMessage();
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>edit Post</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .btn-insert {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <h3 class="mb-4 text-center">edit Posts</h3>
            <div class="mb-3">
                <label for="title2" class="form-label">Title</label>
                <input type="text" class="form-control" id="title2" name="title" value= "<?php echo $title ?>" placeholder="Enter Post title" required>
            </div>
            <div class="mb-3">
                <label for="content4" class="form-label">Content</label>
                <textarea class="form-control" id="content4" name="content" rows="5" placeholder="Enter Post content" required> <?php echo $content ?></textarea>
            </div>
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="mb-3">
                <button class="btn btn-primary btn-lg btn-insert" type="submit">update</button>
            </div>
            
			<div class="mb-3">
               <a href="allposts.php"> <button class="btn btn-primary btn-lg btn-insert" type="submit">Go back</button></a>
            </div>
        </form>
    </div




	
