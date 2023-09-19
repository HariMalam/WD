<!DOCTYPE html>
<html>

<head>
    <title>Project Directory</title>
    <link rel="stylesheet" href="style.css">

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
            echo '<li class="project">';
            echo '<div class="all-open">';
            $absolutePath = realpath($projectsDirectory);
            $encodedPath = urlencode($absolutePath);
            $vsCodeUri = "vscode://file/{$encodedPath}";
            echo "<a href=\"$vsCodeUri\">Open All Projects in VS Code</a>";
            echo '</div>';
            echo '</li>';
            foreach ($projectFolders as $folder) {
                if ($folder !== '.' && $folder !== '..' && is_dir($projectsDirectory . $folder)) {
                    $indexFilePath = $projectsDirectory . $folder . '/index.html';

                    if (file_exists($indexFilePath)) {
                        echo '<li class="project">';
                        echo '<div class="project-name">';
                        echo '<div class="indexfile">';
                        echo "<a href=\"/projects/$folder/index.html\">$folder</a>";
                        echo '</div>';
                        echo '</div>';
                        $encodedFolder = rawurlencode($folder);
                        $encodedPath = urlencode($absolutePath);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$encodedFolder}";
                        echo '<div class="vscode-link">';
                        echo "<a href=\"$vsCodeUri\">Open in VS Code</a>";
                        echo '</div>';
                        echo '</li>';
                    }
                }
            }
            foreach ($projectFolders as $folder) {
                if ($folder !== '.' && $folder !== '..' && is_dir($projectsDirectory . $folder)) {
                    $indexFilePath = $projectsDirectory . $folder . '/index.html';

                    if (!(file_exists($indexFilePath))) {
                        echo '<li class="project">';
                        echo '<div class="project-name">';
                        echo "<a href=\"/project_page.php?folder=$folder\">$folder</a>";
                        echo '</div>';

                        $encodedFolder = rawurlencode($folder);
                        $encodedPath = urlencode($absolutePath);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$encodedFolder}";
                        echo '<div class="vscode-link">';

                        echo "<a href=\"$vsCodeUri\">Open in VS Code</a>";
                        echo '</div>';

                        echo '</li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
</body>

</html>