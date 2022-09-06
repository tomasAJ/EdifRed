const encabezados = document.querySelectorAll(' .encabezado');
const observer = new IntersectionObserver((entradas, observador) => {
    console.log(entradas);
}, {
    threshold: 1,
    rootMargin: '0px'
}

);


encabezados.forEach(encabezado =>{
    observer.observe(encabezado);
});