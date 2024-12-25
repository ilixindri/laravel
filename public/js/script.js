const menuContexto = document.getElementById("custom-menu");
const areaClique =  document;

function exibirMenuContexto(evento) {
    menuContexto.style.display = "block";
  
    let menuWidth = menuContexto.offsetWidth;
    let menuHeight = menuContexto.offsetHeight;
  
    let windowWidth = window.innerWidth;
    let windowHeight = window.innerHeight;
  
    let x = evento.clientX;
    let y = evento.clientY;
  
    if (x + menuWidth > windowWidth) {
      x = windowWidth - menuWidth; // Ajusta a posição para a borda direita
    }
  
      if (x < 0) {
          x = 0;
      }
  
    if (y + menuHeight > windowHeight) {
      y = windowHeight - menuHeight; // Ajusta a posição para a borda inferior
    }
  
      if (y < 0) {
          y = 0;
      }
  
    menuContexto.style.top = y + "px";
    menuContexto.style.left = x -menuWidth -10+ "px";
  }
  
areaClique.addEventListener("contextmenu", exibirMenuContexto);

document.addEventListener('click', function(event) {
  if (!menuContexto.contains(event.target) && event.target !== areaClique) {
    menuContexto.style.display = 'none';
  }
  event.preventDefault();
});

document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") { // Use event.key para melhor compatibilidade
        menuContexto.style.display = 'none';
    }
  });