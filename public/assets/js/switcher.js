// Swicher
function toggleSwitcher() {
    var i = document.getElementById('style-switcher');
    if (i.style.left === "-189px") {
        i.style.left = "0px";
    } else {
        i.style.left = "-189px";
	}
};

function setColor(theme) {
    document.getElementById('color-opt').href = '/assets/css/' + theme + '.css';
    toggleSwitcher(false);
};

function setTheme(theme) {
    document.getElementById('theme-opt').href = '/assets/css/' + theme + '.min.css';
    toggleSwitcher(false);
};
