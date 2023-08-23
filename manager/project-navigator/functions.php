<?php
function generateStyledNavigation($currentPath) {
    $currentDirectory = "projects/$currentPath/";
    $subProjectFolders = scandir($currentDirectory);
    
    echo '<ul class="sub-projects">';
    
    foreach ($subProjectFolders as $subFolder) {
        if ($subFolder !== '.' && $subFolder !== '..' && is_dir($currentDirectory . $subFolder)) {
            echo '<li class="sub-project">';
            echo "<a href=\"/project_page.php?folder=$currentPath/$subFolder\">$subFolder</a>";
            echo '</li>';
        }
    }
    
    echo '</ul>';
}
?>
