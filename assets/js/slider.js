function sliderCarrusel(){
    /*------------------------------------  SLIDER -------------------------------------------- */
    var fila = document.querySelector(".contenedor-carrusel");

    var listaCarrusel = document.querySelectorAll(".li-slider"); //recoge todas los div con la clase pelicula 
    //fila.scrollLeft = 0; //inicializar siempre el slider a cero


    var flechaIzquierda = document.querySelector("#flecha-izquierda");
    var flechaDerecha = document.querySelector("#flecha-derecha");

    /*------------------------------- Event Listener para la flecha derecha -----------------------------*/
    flechaDerecha.addEventListener("click", () => {
        fila.scrollLeft += fila.offsetWidth;
        
        var indicadorActivo = document.querySelector(clase + " .indicadores .activo");

        if(indicadorActivo.nextSibling){
            indicadorActivo.nextSibling.classList.add("activo");
            indicadorActivo.classList.remove("activo");
        }
    });

    /*------------------------------- Event Listener para la flecha izquierda -----------------------------*/
    flechaIzquierda.addEventListener("click", () => {
        fila.scrollLeft -= fila.offsetWidth;

        var indicadorActivo = document.querySelector(clase + " .indicadores .activo");
        if(indicadorActivo.previousSibling){
            indicadorActivo.previousSibling.classList.add("activo");
            indicadorActivo.classList.remove("activo");
        }
    });

    /*------------------------------ paginación de peliculas del carrusel --------------------------------*/
    var numeroPaginas = Math.ceil(listaCarrusel.length / 6);
    //dividimos la cantidad de pelis que hay en el carrusel por las que queremos mostrar a primera vista y redondeamos hacia arriba con Math.ceil

    for(var i = 0; i < numeroPaginas; i++){ //recoggemos la longitud de las pelis en el carrusel
        var indicador = document.createElement("button"); //creamos elemento button por cada pagina

        if(i === 0){
            indicador.classList.add("activo");
        }

        document.querySelector(clase + " .indicadores").appendChild(indicador); //añadimos el button como hijo al div con la clase 'indicadores'

        indicador.addEventListener("click", (e) => {
            fila.scrollLeft = i * document.querySelector(clase + " .contenedor-carrusel").offsetWidth;
            document.querySelector(clase + " .indicadores .activo").classList.remove("activo");
            e.target.classList.add("activo");
        });
    }

    /*------------------------------ hover de peliculas del carrusel --------------------------------*/
    listaCarrusel.forEach((pelicula) => {
        pelicula.addEventListener("mouseenter", (e) => {
            var elemento = e.currentTarget;
            setTimeout(() => {
                listaCarrusel.forEach(pelicula => pelicula.classList.remove("hover"));
                elemento.classList.add("hover");
            }, 0);
        });
    });

    fila.addEventListener("mouseleave", () => {
        listaCarrusel.forEach(pelicula => pelicula.classList.remove("hover"));
    });

    //seleccionPelis();
}

sliderCarrusel();