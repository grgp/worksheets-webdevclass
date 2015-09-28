function changeTheme(newtheme) {
	var theme = document.getElementById('dummycss');
	theme.setAttribute('href', newtheme);
};

function revertTheme(dummycss) {
	var theme = document.getElementById('dummycss');
	theme.setAttribute('href', dummycss);
}