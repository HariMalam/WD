<!DOCTYPE html>
<html>

<head>
    <title>Project Directory</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <header>
        <h1><?php $f = $_GET['folder']; ?></h1>
        <h1><?php echo $f; ?></h1>
    </header>
    <div class="container">
        <?php
        function generateStyledNavigation($currentPath)
        {
            $currentDirectory = "projects/$currentPath/";
            $subProjectFolders = scandir($currentDirectory);

            echo '<ul class="projects">';
            echo '<li class="project open">';
            echo '<div class="all-open">';
            $absolutePath = realpath($currentDirectory);
            $encodedPath = urlencode($absolutePath);
            $vsCodeUri = "vscode://file/{$encodedPath}";
            echo "<a href=\"$vsCodeUri\">Open All Projects in VS Code</a>";
            echo '</div>';
            echo '</li>';
            foreach ($subProjectFolders as $subFolder) {
                if ($subFolder !== '.' && $subFolder !== '..' && is_dir($currentDirectory . $subFolder)) {
                    $indexFilePath = $currentDirectory . $subFolder . '/index.html';
                    if (file_exists($indexFilePath)) {
                        echo '<li class="project">';
                        echo '<div class="project-name">';
                        echo '<div class="indexfile">';
                        echo "<a href=\"/projects/$currentPath/$subFolder\">$subFolder</a>";
                        echo '</div>';
                        echo '</div>';
                        $absolutePath = realpath($currentDirectory);
                        $encodedPath = rawurlencode($absolutePath);
                        $encodedSubFolder = rawurlencode($subFolder);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$encodedSubFolder}";

                        echo '<div class="vscode-link">';
                        echo "<a href=\"$vsCodeUri\">Open in VS Code</a>";
                        echo '</div>';
                        echo '</li>';
                    }
                }
            }
            foreach ($subProjectFolders as $subFolder) {
                if ($subFolder !== '.' && $subFolder !== '..' && is_dir($currentDirectory . $subFolder)) {
                    $indexFilePath = $currentDirectory . $subFolder . '/index.html';
                    if (!(file_exists($indexFilePath))) {
                        echo '<li class="project">';
                        echo '<div class="project-name">';
                        echo "<a href=\"/project_page.php?folder=$currentPath/$subFolder\">$subFolder</a>";
                        echo '</div>';
                       $absolutePath = realpath($currentDirectory);
                        $encodedPath = rawurlencode($absolutePath);
                        $encodedSubFolder = rawurlencode($subFolder);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$encodedSubFolder}";
                        echo '<div class="vscode-link">';
                        echo "<a href=\"$vsCodeUri\">Open in VS Code</a>";
                        echo '</div>';
                        echo '</li>';
                    }
                }
            }
            echo '</ul>';
        }

        $folder = $_GET['folder'];
        $subProjectsDirectory = "projects/$folder/";

        echo "<div class=\"projects-container\">";
        generateStyledNavigation($folder);
        echo "</div>";
        ?>
    </div>
</body>

</html>