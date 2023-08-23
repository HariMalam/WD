<!DOCTYPE html>
<html>
<head>
    <title>Project Directory</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to My Projects</h1>
    </header>
    <div class="container">
        <ul class="projects">
            <?php
            $projectsDirectory = 'projects/';
            $projectFolders = scandir($projectsDirectory);
            
            foreach ($projectFolders as $folder) {
                if ($folder !== '.' && $folder !== '..' && is_dir($projectsDirectory . $folder)) {
                    echo '<li class="project">';
                    echo "<a href=\"/project_page.php?folder=$folder\">$folder</a>";
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>
