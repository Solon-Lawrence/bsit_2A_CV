<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/index.css?v=3">
</head>
<body>
    
    <div id="form-box">

    <div id="header">
        <h1>CV Basic Form</h1>
    </div>

    <form id="cv-form" action="./views/output.php" method="POST" enctype="multipart/form-data">
        <div id="profile">
            <h2>Profile Information</h2>
            <label for="name">Full Name:</label><br>
            <input type="text" name = "name" placeholder="Input Your Name Here"> <br>
            <label for="wposition">Work Position:</label><br>
            <input type="text" name = "wposition" placeholder="Input Your Desired Work Position Here"> <br>
            <label for="about">About Me:</label><br>
            <textarea name="about" id="about" rows="5" placeholder="Tell us about yourself..."></textarea><br>
            <label for="image_profile">Profile Image:</label><br>
            <input type="file" name="profile"> <br>
        </div>

        <div id="contact-details">
            <h2>Contact Details</h2>
            <label for="number">Phone Number:</label><br>
            <input type="number" name="number" placeholder="Ex. 0924######"><br>
            <label for="gmail">Gmail:</label><br>
            <input type="email" name="gmail" placeholder="example@gmail.com"> <br>
        </div>

        <div id="Skills">
            <h2>Skills</h2>
            <label for="skills">Skills:</label><br>
            <div id="skills-wrapper">
                <input type="text" name="skills[]" placeholder="e.g. HTML"><br>
            </div>
            <button type="button" id="add-skill">+ Add Skill</button>
        </div>

        <div id="languages">
            <h2>Languages</h2>
            <label for="languages">Languages:</label><br>
            <div id="languages-wrapper">
                <input type="text" name="languages[]" placeholder="e.g. English"><br>
            </div>
            <button type="button" id="add-language">+ Add Language</button>
        </div>

        <div id="submit">
            <input type="submit" name = "submit"value="Submit"> <br>
        </div>
    </form>

    </div>

</body>
<script src="./assets/js/index.js?v=3"></script>
</html>