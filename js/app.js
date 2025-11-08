/* Start - js/app.js */
document.addEventListener('DOMContentLoaded', function() {
	const urlParams = new URLSearchParams(window.location.search);
	const page = urlParams.get('pagina') || 'home';
	const links = document.querySelectorAll('.nav-link');
	links.forEach(function(link) {
		const linkPage = link.getAttribute('data-page');
		if (linkPage === page) {
			link.classList.add('active');
		}
	});
});
/* End - js/app.js */
