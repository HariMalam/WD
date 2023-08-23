document.addEventListener('DOMContentLoaded', function () {
    const projects = document.querySelectorAll('.project-link');
    const contextMenu = document.getElementById('context-menu');
    
    // Attach right-click event to each project link
    projects.forEach(function (project) {
        project.addEventListener('contextmenu', function (e) {
            e.preventDefault();
            const xPos = e.clientX;
            const yPos = e.clientY;
            showContextMenu(xPos, yPos);
        });
    });
    
    // Show context menu
    function showContextMenu(x, y) {
        contextMenu.style.left = x + 'px';
        contextMenu.style.top = y + 'px';
        contextMenu.classList.add('active');
    }
    
    // Hide context menu when clicking elsewhere
    document.addEventListener('click', function () {
        contextMenu.classList.remove('active');
    });
});
