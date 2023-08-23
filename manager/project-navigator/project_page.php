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
        <div class="projects-container">
            <?php
            include 'functions.php';
            
            $folder = $_GET['folder'] ?? '';
            
            echo '<div class="projects">';
            generateStyledNavigation($folder);
            echo '</div>';
            ?>
        </div>
    </div>
</body>
</html>
