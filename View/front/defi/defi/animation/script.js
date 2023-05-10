const startBtn = document.getElementById('start-btn');
const logoContainer = document.getElementById('logo-container');

startBtn.addEventListener('click', () => {
	logoContainer.classList.add('rotate');
	setTimeout(() => {
		window.location.href = 'http://localhost/crud/view/front/media/Page-2.php';
	}, 2000);
});
