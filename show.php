<?php
include_once("includes/conn.php");

try {
    $id = $_GET["id"];
    $sql = "SELECT * FROM `posts` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    $title = $result["title"];
    $content = $result["content"];
    $created_at = $result["created_at"];
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
        body {
            background-color: #f6f6f6;
        }

        .box {
            width: 350px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        .box h2 {
            color: #ffffff;
            background-color: #03a9f4;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin-top: 0;
        }

        .box ul {
            padding: 0;
            margin-top: 20px;
            list-style-type: none;
        }

        .box ul li {
            padding: 10px;
            background-color: #ffffff;
            border-radius: 4px;
            margin-bottom: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .box ul li span {
            font-weight: bold;
            color: #03a9f4;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <h2>Show Post</h2>
            <ul>
                <li><span>Post Title:</span> <?php echo $title; ?></li>
                <li><span>Post Content:</span> <?php echo $content; ?></li>
                <li><span>Created Date:</span> <?php echo $created_at; ?></li>
            </ul>
        </div>
        
               <a href="allposts.php"> <button  class="btn btn-primary btn-lg btn-insert" type="submit">Go back</button></a>
           
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqVSt94QDF+D6N6Mt9K5mkFL9t+P8xnGUVvY/e0pQm+8lWKN5I" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqVSt94QDF+D6N6Mt9K5mkFL9t+P8xnGUVvY/e0pQm+8lWKN5I" crossorigin="anonymous"></script>
</body>

</html>
