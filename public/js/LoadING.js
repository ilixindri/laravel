function LoadING() {
    const canvas = document.getElementsByTagName('canvas')[0];
    const context = canvas.getContext('2d');
    const duration = 1000; // 1 segundo
    const startTime = Date.now();

    function updateCanvasSize() {
        // Obtém as dimensões da janela
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;
      
        // Define o tamanho do canvas com base nas dimensões da janela
        canvas.width = windowWidth;
        canvas.height = windowHeight;
      
        // Chama sua função de desenho ou animação aqui
        draw();
    }

    function draw() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        context.clearRect(0, 0, canvas.width, canvas.height);

        const elapsedTime = Date.now() - startTime;
        const progress = Math.min(elapsedTime / duration, 1);

        const radius = 150;
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;

        context.beginPath();
        context.arc(centerX, centerY, radius, 0, 2 * Math.PI);
        context.strokeStyle = '#3498db';
        context.lineWidth = 4;
        context.stroke();

        const endAngle = 2 * Math.PI * progress - 0.5 * Math.PI;
        context.beginPath();
        context.arc(centerX, centerY, radius, -0.5 * Math.PI, endAngle);
        context.strokeStyle = '#e74c3c';
        context.lineWidth = 4;
        context.stroke();

        if (progress < 1) {
            requestAnimationFrame(draw);
        }
    }

    window.addEventListener('resize', updateCanvasSize);

    draw();
}
LoadING()
var inicioCarregamento = performance.now();
window.addEventListener("load", function() {
    var fimCarregamento = performance.now();
    var tempoTotal = fimCarregamento - inicioCarregamento;
    if (tempoTotal ) {}
    console.log("A página foi carregada em " + tempoTotal + " milissegundos.");
});