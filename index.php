<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body>
    
    <form action="./views/output.php" method="POST" enctype="multipart/form-data">
        <input type="text" name = "name" placeholder="Input Your Name Here"> <br>
        <input type="number" name = "age" placeholder="Input Your Age Here"> <br>
        <input type="file" name="profile"> <br>
        <input type="submit" name = "submit"value="Submit"> <br>
    </form>


</body>
<script src="./assets/js/index.js"></script>
</html>