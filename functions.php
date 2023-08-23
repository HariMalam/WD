<?php
function generateStyledNavigation($currentPath) {
    $currentDirectory = "projects/$currentPath/";
    $subProjectFolders = scandir($currentDirectory);

    echo '<div class="container">';
    echo '<div class="form-container">';
    echo '<form method="post" action="">';
    echo '<input type="text" name="newFolderName" placeholder="Enter folder name">';
    echo '<button type="submit" name="createFolder">Create Folder</button>';
    echo '</form>';
    echo '</div>';

    echo '<div class="form-container">';
    echo '<form method="post" action="">';
    echo '<select name="folderToDelete">';
    foreach ($subProjectFolders as $subFolder) {
        if ($subFolder !== '.' && $subFolder !== '..' && is_dir($currentDirectory . $subFolder)) {
            echo "<option value='$subFolder'>$subFolder</option>";
        }
    }
    echo '</select>';
    echo '<button type="submit" name="deleteFolder">Delete Folder</button>';
    echo '</form>';
    echo '</div>';

    echo '<div class="form-container">';
    echo '<form method="post" action="">';
    echo '<button type="submit" name="backward">Backward</button>';
    echo '</form>';
    echo '</div>';

    echo '<div class="vscode-links">';
    foreach ($subProjectFolders as $subFolder) {
        if ($subFolder !== '.' && $subFolder !== '..' && is_dir($currentDirectory . $subFolder)) {
            echo "<a class=\"button\" href='" . generateVsCodeLink($currentDirectory . $subFolder) . "'>Open with VS Code</a>";
        }
    }
    echo '</div>';
    
    echo '</div>';
}

function generateVsCodeLink($folderPath) {
    $vsCodeLink = "vscode://file/$folderPath";
    return $vsCodeLink;
}

if (!isset($_SESSION['navigation_history'])) {
    $_SESSION['navigation_history'] = array();
}

// Rest of the code...
?>
