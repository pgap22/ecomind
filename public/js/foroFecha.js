const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
const fechas = document.querySelectorAll(".foro-date");
fechas.forEach(fecha => {
    fecha.innerHTML = new Date(fecha.innerHTML).toLocaleDateString('es-Es', options)
})