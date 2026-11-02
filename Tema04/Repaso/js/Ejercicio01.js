const TAREA_IN = document.getElementById('tarea');
const PRIORIDAD_SELECT = document.getElementById('prioridad');
const CREAR_BTN = document.getElementById('crear');
const CUERPO_TABLA = document.getElementById('cuerpo-tabla');

if(CREAR_BTN) {
    CREAR_BTN.addEventListener('click', () => {
        var tarea = TAREA_IN.value.trim();
        var prioridad = PRIORIDAD_SELECT.value.trim();
        if(tarea === '' || prioridad === '') return;
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open('POST', '/php/Ejercicio01.php', true);
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send(`tarea=${tarea}&prioridad=${prioridad}`);
        xmlHttp.onreadystatechange = () => {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                CUERPO_TABLA.innerHTML += xmlHttp.responseText;
            }
        }
    });
}

