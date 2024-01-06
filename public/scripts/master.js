document.getElementById('auth').addEventListener('contextmenu', function(event) {
    event.preventDefault();
    
	var customMenu = document.getElementById('custom-menu');
    customMenu.style.left = event.pageX + 'px';
    customMenu.style.top = event.pageY + 'px';
    customMenu.style.display = 'block';
});
document.addEventListener('click', function() {
    var customMenu = document.getElementById('custom-menu');
    customMenu.style.display = 'none';
});
