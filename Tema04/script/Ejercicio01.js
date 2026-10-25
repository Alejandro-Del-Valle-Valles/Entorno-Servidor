//Author Lua DeVV
const NAME_IN = document.getElementById('name');
const SHOW_BTN = document.getElementById('show');
const RESULT_DIV = document.getElementById('result');

if(SHOW_BTN) {
    SHOW_BTN.addEventListener('click', () => {
        var name = NAME_IN.value.trim();
        if(name === '') {
            alert('El nombre no puede estar vacío.');
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', `/php/Ejercicio01.php?name=${name}`, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = () => {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) RESULT_DIV.innerHTML = xmlhttp.response;
        }
    });
}