/**
 * Show the sidebar
 */
// Wrap in a function to ensure no collisions with other code
(() => {
    let sidebar = document.getElementById('sidebar');

    /**
     * Sets all classes required for the sidebar to be shown
     */
    let showSidebar = function () {
        sidebar.classList.add('c-sidebar-lg-show');
    };

    /**
     * Returns true if sidebar should be shown, false if it shouldn't.
     * @returns {boolean}
     */
    let sidebarShouldBeShown = function () {
        let item = window.localStorage.getItem('remember_sidebar');
        return (item === null || item === 'true');
    };

    if (sidebarShouldBeShown()) {
        showSidebar();
    }

    // Whether we need to collapse the sidebar or not, it will happen instantly.
    // Smoothness in transitions will be enabled after loading the page
    window.setTimeout(() => {
        sidebar.classList.remove('c-no-transition');
    }, 150);

    // Add the event listener on `classtoggle` for the sidebar.
    // Save whether it has the classes to be collapsed or not.
    sidebar.addEventListener('classtoggle', () => {
        let collapsed = sidebar.classList.contains('c-sidebar-lg-show') ? 'true' : 'false';
        window.localStorage.setItem('remember_sidebar', collapsed);
    });
})();