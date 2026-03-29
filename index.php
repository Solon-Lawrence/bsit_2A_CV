<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/index.css?v=5">
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
                <div class="dynamic-row simple-row">
                    <input type="text" name="skills[]" placeholder="e.g. HTML">
                    <button type="button" class="remove-entry">Remove</button>
                </div>
            </div>
            <button type="button" id="add-skill">+ Add Skill</button>
        </div>

        <div id="languages">
            <h2>Languages</h2>
            <label for="languages">Languages:</label><br>
            <div id="languages-wrapper">
                <div class="dynamic-row simple-row">
                    <input type="text" name="languages[]" placeholder="e.g. English">
                    <button type="button" class="remove-entry">Remove</button>
                </div>
            </div>
            <button type="button" id="add-language">+ Add Language</button>
        </div>

        <div id="work-experience">
            <h2>Work Experience</h2>
            <div id="experience-wrapper">
                <div class="dynamic-row experience-item">
                    <label>Job Title:</label>
                    <input type="text" name="work_title[]" placeholder="e.g. Web Developer">

                    <label>Period:</label>
                    <input type="text" name="work_period[]" placeholder="e.g. Jan 2022 - Dec 2023">

                    <label>Company / Location:</label>
                    <input type="text" name="work_company[]" placeholder="e.g. ABC Company - Manila">

                    <label>Description (one point per line):</label>
                    <textarea name="work_description[]" rows="4" placeholder="- Built responsive web pages"></textarea>

                    <button type="button" class="remove-entry">Remove Experience</button>
                </div>
            </div>
            <button type="button" id="add-experience">+ Add Work Experience</button>
        </div>

        <div id="education">
            <h2>Education</h2>
            <div id="education-wrapper">
                <div class="dynamic-row education-item">
                    <label>Degree / Program:</label>
                    <input type="text" name="education_degree[]" placeholder="e.g. Bachelor of Science in IT">

                    <label>Period:</label>
                    <input type="text" name="education_period[]" placeholder="e.g. 2021 - 2025">

                    <label>School / Location:</label>
                    <input type="text" name="education_school[]" placeholder="e.g. XYZ University - Manila">

                    <button type="button" class="remove-entry">Remove Education</button>
                </div>
            </div>
            <button type="button" id="add-education">+ Add Education</button>
        </div>

        <div id="submit">
            <input type="submit" name = "submit"value="Submit"> <br>
        </div>
    </form>

    </div>

</body>
<script src="./assets/js/index.js?v=4"></script>
</html>