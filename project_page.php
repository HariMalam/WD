<!DOCTYPE html>
<html>

<head>
    <title>Project Directory</title>
    <style>
        /* Paste your landing page's CSS here */
        ody {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .projects {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
            cursor: pointer;
        }

        .project a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }

        .project {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .project:hover {
            background-color: #f0f0f0;
        }

        .project a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .indexfile a {
            color: red;
        }

        .project {
            /* ...existing styles... */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            /* padding: 20px 20px 10px; Adjust padding for spacing */
            /* height: 100%; Make the project tile expand to fill the container */
        }

        .project-name {
            font-size: 28px;
            /* Adjust font size as needed */
            text-align: center;
            padding-bottom: 20px;
            /* margin-bottom: 10px; Add margin to separate from VS Code link */
        }

        .vscode-link {
            /* ...existing styles... */
            text-align: center;
            font-family: cursive;
            font-size: small;
            /* text-decoration: underline; */
        }
    </style>
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
            // echo $currentDirectory;
            foreach ($subProjectFolders as $subFolder) {
                if ($subFolder !== '.' && $subFolder !== '..' && is_dir($currentDirectory . $subFolder)) {
                    $indexFilePath = $currentDirectory . $subFolder . '/index.html';
                    if (file_exists($indexFilePath)) {
                        echo '<li class="project">';
                        echo '<div class="project-name">';
                        echo '<div class="indexfile">';
                        echo "<a href=\"/projects/$currentPath/$subFolder/index.html\">$subFolder</a>";
                        echo '</div>';
                        echo '</div>';
                        $absolutePath = realpath($currentDirectory);
                        $encodedPath = urlencode($absolutePath);
                        $encodedPath = rawurlencode($absolutePath);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$subFolder}";
                        
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
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$subFolder}";
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