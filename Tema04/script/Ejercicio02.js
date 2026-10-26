const COMUNITIES_SELECT = document.getElementById('comunities');
const PROVINCES_SELECT = document.getElementById('provinces');

if(COMUNITIES_SELECT) getComunities();

if(PROVINCES_SELECT && COMUNITIES_SELECT) {
    COMUNITIES_SELECT.addEventListener('change', (event) => {
        var comunity = event.target.value;
        if(comunity === '') return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', '/php/Ejercicio02.php?comunity=' + encodeURIComponent(comunity), true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                PROVINCES_SELECT.innerHTML = xmlhttp.responseText;
            }
        }
    });
}

function getComunities() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', '/php/Ejercicio02.php?comunities=true', true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = () => {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            COMUNITIES_SELECT.innerHTML = xmlhttp.responseText;
        }
    }
}