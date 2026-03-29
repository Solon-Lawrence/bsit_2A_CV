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
    <link rel="stylesheet" href="../assets/css/output.css">
</head>
<body>

    <div id="main-box">

        <div id="aside">
            <div id="pImage">
                <img src="<?php echo $path; ?>" alt="Profile Image">
            </div>
        </div>

        <div id="main">
            <h1>This is a main</h1>
        </div>

    </div>

</body>
</html>

<?php
    }
?>