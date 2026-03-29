<?php
    if(isset($_POST['submit'])){
        $folder = "../assets/uploads/";

        $filename = $_FILES['profile']['name'] ?? '';
        $tmp_name = $_FILES['profile']['tmp_name'] ?? '';

        $path = $folder . basename($filename);

        if(!empty($tmp_name)){
            move_uploaded_file($tmp_name, $path);
        }

        $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $position = htmlspecialchars(trim($_POST['wposition'] ?? ''), ENT_QUOTES, 'UTF-8');
        $about = htmlspecialchars(trim($_POST['about'] ?? ''), ENT_QUOTES, 'UTF-8');
        $number = htmlspecialchars(trim($_POST['number'] ?? ''), ENT_QUOTES, 'UTF-8');
        $gmail = htmlspecialchars(trim($_POST['gmail'] ?? ''), ENT_QUOTES, 'UTF-8');

        $skills = array_filter($_POST['skills'] ?? [], function($skill){
            return trim($skill) !== '';
        });

        $languages = array_filter($_POST['languages'] ?? [], function($language){
            return trim($language) !== '';
        });

        $workTitles = $_POST['work_title'] ?? [];
        $workPeriods = $_POST['work_period'] ?? [];
        $workCompanies = $_POST['work_company'] ?? [];
        $workDescriptions = $_POST['work_description'] ?? [];

        $workExperiences = [];
        $workCount = max(count($workTitles), count($workPeriods), count($workCompanies), count($workDescriptions));

        for($i = 0; $i < $workCount; $i++){
            $title = trim($workTitles[$i] ?? '');
            $period = trim($workPeriods[$i] ?? '');
            $company = trim($workCompanies[$i] ?? '');
            $descriptionRaw = trim($workDescriptions[$i] ?? '');

            if($title === '' && $period === '' && $company === '' && $descriptionRaw === ''){
                continue;
            }

            $descriptionLines = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $descriptionRaw)));

            $workExperiences[] = [
                'title' => htmlspecialchars($title, ENT_QUOTES, 'UTF-8'),
                'period' => htmlspecialchars($period, ENT_QUOTES, 'UTF-8'),
                'company' => htmlspecialchars($company, ENT_QUOTES, 'UTF-8'),
                'description_lines' => array_map(function($line){
                    return htmlspecialchars($line, ENT_QUOTES, 'UTF-8');
                }, $descriptionLines)
            ];
        }

        $educationDegrees = $_POST['education_degree'] ?? [];
        $educationPeriods = $_POST['education_period'] ?? [];
        $educationSchools = $_POST['education_school'] ?? [];

        $educations = [];
        $educationCount = max(count($educationDegrees), count($educationPeriods), count($educationSchools));

        for($i = 0; $i < $educationCount; $i++){
            $degree = trim($educationDegrees[$i] ?? '');
            $period = trim($educationPeriods[$i] ?? '');
            $school = trim($educationSchools[$i] ?? '');

            if($degree === '' && $period === '' && $school === ''){
                continue;
            }

            $educations[] = [
                'degree' => htmlspecialchars($degree, ENT_QUOTES, 'UTF-8'),
                'period' => htmlspecialchars($period, ENT_QUOTES, 'UTF-8'),
                'school' => htmlspecialchars($school, ENT_QUOTES, 'UTF-8')
            ];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css?v=14">
</head>
<body>

    <div id="cv-layout">
        <aside id="aside">
            <div id="pImage">
                <img src="<?php echo htmlspecialchars($path, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Image">
            </div>

            <div id="pName">
                <h1><?php echo $name ?: 'Your Name'; ?></h1>
                <h2><?php echo $position ?: 'Work Position'; ?></h2>
            </div>

            <section id="contact-d" class="aside-section">
                <h3>Contact Details</h3>

                <?php if($number): ?>
                    <p class="contact-item">
                        <span class="contact-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#FFFFFF">
                                <path d="M760-482q0-117-81.5-198.5T480-762v-80q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-482h-80Zm-160 0q0-50-35-85t-85-35v-80q83 0 141.5 58.5T680-482h-80Zm198 362q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12Z"/>
                            </svg>
                        </span>
                        <?php echo $number; ?>
                    </p>
                <?php endif; ?>

                <?php if($gmail): ?>
                    <p class="contact-item">
                        <span class="contact-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#FFFFFF">
                                <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/>
                            </svg>
                        </span>
                        <?php echo $gmail; ?>
                    </p>
                <?php endif; ?>
            </section>

            <?php if(!empty($skills)): ?>
                <section id="skills" class="aside-section">
                    <h3>Skills</h3>
                    <ul>
                        <?php foreach($skills as $skill): ?>
                            <li><?php echo htmlspecialchars(trim($skill), ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if(!empty($languages)): ?>
                <section id="languages" class="aside-section">
                    <h3>Languages</h3>
                    <ul>
                        <?php foreach($languages as $language): ?>
                            <li><?php echo htmlspecialchars(trim($language), ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>
        </aside>

        <main id="main">
            <section class="main-section">
                <h2>Profile</h2>
                <p><?php echo $about ?: 'Profile summary is not available.'; ?></p>
            </section>

            <?php if(!empty($workExperiences)): ?>
                <section class="main-section">
                    <h2>Work Experience</h2>
                    <?php foreach($workExperiences as $work): ?>
                        <article class="entry-item">
                            <div class="entry-head">
                                <h3><?php echo $work['title'] ?: 'Position'; ?></h3>
                                <?php if($work['period']): ?>
                                    <span class="entry-period"><?php echo $work['period']; ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if($work['company']): ?>
                                <p class="entry-subtitle"><?php echo $work['company']; ?></p>
                            <?php endif; ?>

                            <?php if(!empty($work['description_lines'])): ?>
                                <ul class="entry-list">
                                    <?php foreach($work['description_lines'] as $line): ?>
                                        <li><?php echo $line; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>

            <?php if(!empty($educations)): ?>
                <section class="main-section">
                    <h2>Education</h2>
                    <?php foreach($educations as $education): ?>
                        <article class="entry-item">
                            <div class="entry-head">
                                <h3><?php echo $education['degree'] ?: 'Degree'; ?></h3>
                                <?php if($education['period']): ?>
                                    <span class="entry-period"><?php echo $education['period']; ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if($education['school']): ?>
                                <p class="entry-subtitle"><?php echo $education['school']; ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>
        </main>
    </div>

</body>
</html>

<?php
    }
?>