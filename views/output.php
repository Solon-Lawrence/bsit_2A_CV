<?php
    if(isset($_POST['submit'])){
        $folder = "../assets/uploads/";

        $filename = $_FILES['profile']['name'];
        $tmp_name = $_FILES['profile']['tmp_name'];

        $path = $folder . $filename;

        move_uploaded_file($tmp_name, $path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div>
            <img src="<?=  $path ?>" alt="">
            <p>Name: <?= $_POST['name']?></p><br>
            <p>Age: <?= $_POST['age']?></p>
        </div>

</body>
</html>

<?php
    }
?>