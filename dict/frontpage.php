<!DOCTYPE html>
<html>
<head>
    <title>Project Directory</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to My Projects</h1>
    </header>
    <div class="container">
        <!-- Loop through projects and display them -->
        <?php
        $projectsDirectory = 'projects/';
        $projectFolders = scandir($projectsDirectory);
        ?>
        <ul class="projects">
            <?php foreach ($projectFolders as $folder) : ?>
                <?php if ($folder !== '.' && $folder !== '..' && is_dir($projectsDirectory . $folder)) : ?>
                    <li class="project">
                        <a href="#" class="project-link"><?php echo $folder; ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="context-menu" class="context-menu">
        <ul>
            <li><a href="#" id="create-folder">Create Folder</a></li>
            <li><a href="#" id="open-vscode">Open with VS Code</a></li>
            <li><a href="#" id="delete-folder">Delete Folder</a></li>
        </ul>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
