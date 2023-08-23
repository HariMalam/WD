<!DOCTYPE html>
<html>

<head>
    <title>Project Directory</title>
    <style>
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
            font-family: sans-serif;
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
        }

        .indexfile a {
            color: red;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        .all-open{
            text-align: center;
            font-family: cursive;
            font-size: medium;
            font-family: 'Times New Roman', Times, serif;
            
        }
    </style>
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
                        $absolutePath = realpath($projectsDirectory);
                        $encodedPath = urlencode($absolutePath);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$folder}";
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

                        $absolutePath = realpath($projectsDirectory);
                        $encodedPath = rawurlencode($absolutePath);
                        $vsCodeUri = "vscode://file/{$encodedPath}/{$folder}";
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