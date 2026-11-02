const NUMERO_IN = document.getElementById('numero');
const TRADUCIR_BTN = document.getElementById('traducir');
const RESULTADO_DIV = document.getElementById('resultado');

if(TRADUCIR_BTN) {
    TRADUCIR_BTN.addEventListener('click', () => {
        var numero = parseInt(NUMERO_IN.value);
        var idioma = document.querySelector('input[name="idioma"]:checked').value;
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open('GET', `/php/Ejercicio02.php?idioma=${idioma}&numero=${numero}`)
        xmlHttp.send();

        xmlHttp.onreadystatechange = () => {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) RESULTADO_DIV.innerHTML = xmlHttp.responseText;
        }
    });
}